<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

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
        return view('admin.create_product');
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->categoryId = $request->categoryId;
        $product->manufacturerId = $request->manufacturerId;
        $product->save();

        return redirect(config('urls.admin_view_products.url'));
    }

    public function delete($productId)
    {
        Product::destroy($productId);

        return redirect(config('urls.admin_view_products.url'));
    }
}
