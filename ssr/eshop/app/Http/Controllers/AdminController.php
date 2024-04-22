<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Manufacturer;
use Illuminate\Support\Str;
use App\Enums\ProductAvailability;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.view_products', [
            'products' => Product::all(),
        ]);
    }

    public function edit($productId)
    {
        return view('admin.edit_product', [
            'product' => Product::find($productId),
        ]);
    }

    public function update(Request $request, $productId)
    {
        $product = Product::find($productId);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->categoryId = $request->categoryId;
        $product->manufacturerId = $request->manufacturerId;
        $product->save();

        return redirect(config('urls.admin_view_products.url'));
    }

    public function create()
    {
        $categories = Category::get();
        $manufacturers = Manufacturer::get();
        $availabilities = ProductAvailability::cases();
        return view('admin.create_product', [
            'categories' => $categories,
            'manufacturers' => $manufacturers,
            'availabilities' => $availabilities,
        ]);
    }

    public function store(Request $request)
    {
        # todo: featured image, gallery images

        $product = new Product();
        $category = Category::find($request->categoryID);
        $manufacturer = Manufacturer::find($request->manufacturer);

        $product->id = (string) Str::uuid();
        $product->slug = Str::slug($request->productName);

        $product->title = $request->productName;
        $product->featuredImage = $request->productImage;
        $product->price = $request->price;
        $product->category()->associate($category->id);
        $product->manufacturer()->associate($manufacturer->id);
        $product->availability = $request->availability;
        $product->shortDescription = $request->shortDescription;
        $product->longDescription = $request->detailedDescription;

        $galery = $request->galleryImages;

        $product->save();

        

        return redirect(config('urls.admin_view_products.url'));
    }

    public function delete($productId)
    {
        Product::destroy($productId);

        return redirect(config('urls.admin_view_products.url'));
    }
}
