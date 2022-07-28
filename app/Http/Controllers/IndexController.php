<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Product, Category};

class IndexController extends Controller
{
    public function index(Request $request) {
        $products = Product::latest()->paginate(16);
        $categories = Category::all();

        return view('index')
            ->with(compact('products'))
            ->with(compact('categories'));
    }
}
