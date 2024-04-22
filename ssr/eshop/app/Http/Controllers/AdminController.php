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
}
