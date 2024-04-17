<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Ensure this is the correct path to your Product model
include app_path('Helpers/availabilityEnumDecoder.php');


class ProductDetailController extends Controller
{
    public function index($slug)
    {

        $product = Product::with(["manufacturer", "category", "galleryImages"])->where('slug', $slug)->firstOrFail();
        $featuredProducts = Product::with(['category', 'manufacturer'])
            ->where('categoryId', $product->category->id)
            ->where('id', '!=', $product->id) // Exclude the current product
            ->take(4)
            ->get();

        return view('product_detail', [
            'product' => $product,
            'featuredProducts' => $featuredProducts

        ]);
    }
}
