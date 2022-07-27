<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function add(Request $request) {
        // $this->authorize('add'); I cannot use authorization because I don't use authentication here

        $data = $request->validate([
            'name'=>'required|min:25|max:800',
            'price'=>'required|numeric|between:0,999999.99',
            'description'=>'sometimes|max:4000',
            'image'=>'sometimes|max:2000'
        ]);

        Product::create($data);
    }

    public function update(Request $request) {
        $data = $request->validate([
            'product_id'=>'required|exists:products,id',
            'name'=>'required|min:25|max:800',
            'price'=>'required|numeric|between:0,999999.99',
            'description'=>'sometimes|max:4000',
            'image'=>'sometimes|max:2000'
        ]);

        $product = Product::find($data['product_id']);
        unset($data['product_id']);
        $product->update($data);
    }
}
