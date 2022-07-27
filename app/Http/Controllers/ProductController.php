<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function add(Request $request) {
        // $this->authorize('add')

        $data = $request->validate([
            'name'=>'required|min:25|max:800',
            'price'=>'required|numeric|between:0,999999.99',
            'description'=>'sometimes|max:4000',
            'image'=>'sometimes|max:2000'
        ]);

        Product::create($data);
    }
}
