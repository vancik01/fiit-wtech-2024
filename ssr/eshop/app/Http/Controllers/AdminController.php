<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\GalleryImage;
use App\Models\Product;
use App\Models\Manufacturer;
use Illuminate\Support\Str;
use App\Enums\ProductAvailability;
use Illuminate\Support\Facades\Storage;
use Throwable;
use Illuminate\Support\Facades\Validator;

include app_path('Helpers/availabilityEnumDecoder.php');

class AdminController extends Controller
{

    protected function uploadfile($file, $productId)
    {
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs('images/products/' . $productId, $filename, ['disk' => 's3', 'visibility' => 'public']);

        return env("AWS_URL") . "/" . env("AWS_BUCKET") . "/" . $filePath;
    }

    protected function deleteProductFolder($productId)
    {
        $folderPath = 'images/products/' . $productId;

        $files = Storage::disk('s3')->allFiles($folderPath);

        Storage::disk('s3')->delete($files);
        Storage::disk('s3')->deleteDirectory($folderPath);

        return 'Product folder deleted successfully.';
    }

    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('admin.view_products', [
            'products' => $products,
        ]);
    }

    public function edit($slug)
    {
        return view('admin.edit_product', [
            'product' => Product::where('slug', $slug)->firstOrFail(),
            'categories' => Category::get(),
            'manufacturers' => Manufacturer::get(),
            'availabilities' => ProductAvailability::cases(),
        ]);
    }

    public function update(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $category = Category::find($request->category)->firstOrFail();
        $manufacturer = Manufacturer::find($request->manufacturer);
        if ($request->productName != null) {
            $product->title = $request->productName;
            $product->slug = Str::slug($request->productName);
        }

        $product->price = $request->price;
        $product->category()->associate($category->id);
        $product->manufacturer()->associate($manufacturer->id);
        $product->availability = $request->availability;
        $product->shortDescription = $request->shortDescription;
        $product->longDescription = $request->detailedDescription;
        if ($request->hasFile("productImage")) {
            $product->featuredImage = $this->uploadfile($request->productImage, $product->id);
        }
        $galery = $request->galleryImages;

        if ($request->galleryImagesToRemove != "") {
            $imageIds = explode(',', $request->galleryImagesToRemove); // Split the string back into an array
            foreach ($imageIds as $imageId) {
                $image = GalleryImage::find($imageId);
                if ($image) {
                    GalleryImage::destroy($imageId);
                }
            }
        }
        $product->save();

        if ($request->hasFile('galleryImages')) {
            foreach ($request->file('galleryImages') as $file) {
                // Create and save the GalleryImage for each file
                $galleryImage = new GalleryImage([
                    'id' => Str::uuid(),
                    'productId' => $product->id,
                    'imageURL' => $this->uploadfile($file, $product->id)
                ]);
                $galleryImage->save();
            }
        }

        return redirect()->back()
            ->with('success', 'Zmeny boli uložené');
    }

    public function create()
    {
        return view('admin.create_product', [
            'categories' => Category::get(),
            'manufacturers' => Manufacturer::get(),
            'availabilities' => ProductAvailability::cases(),
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'productName' => 'required|string|max:255',
            'price' => 'required|numeric',
            'productImage' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'galleryImages' => 'nullable|array',
            'galleryImages.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Chyba pri vytváraní produktu');
        }

        $product = new Product();
        $category = Category::find($request->categoryID);
        $manufacturer = Manufacturer::find($request->manufacturer);

        $product->id = (string) Str::uuid();
        $product->slug = Str::slug($request->productName);
        $product->title = $request->productName;
        $product->price = $request->price;
        $product->category()->associate($category->id);
        $product->manufacturer()->associate($manufacturer->id);
        $product->availability = $request->availability;
        $product->shortDescription = $request->shortDescription;
        $product->longDescription = $request->detailedDescription;

        $product->featuredImage = $this->uploadfile($request->productImage, $product->id);
        $galery = $request->galleryImages;

        try {
            $product->save();
            if ($request->hasFile('galleryImages')) {
                foreach ($request->file('galleryImages') as $file) {
                    // Create and save the GalleryImage for each file
                    $galleryImage = new GalleryImage([
                        'id' => Str::uuid(),
                        'productId' => $product->id,
                        'imageURL' => $this->uploadfile($file, $product->id)
                    ]);
                    $galleryImage->save();
                }
            }
        } catch (Throwable $th) {
            return redirect()->back()
                ->with('error', 'Chyba pri vytváraní produktu' . $th);
        }



        return redirect(config('urls.admin_view_products.url'));
    }

    public function delete($productId)
    {
        Product::destroy($productId);
        $this->deleteProductFolder($productId);

        return redirect(config('urls.admin_view_products.url'));
    }
}
