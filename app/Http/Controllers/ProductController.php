<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function index(Request $request) {

    }

    public function view(Request $request) {

    }

    public function create(Request $request) {
        Product::create($this->validateData($request));
    }

    public function update(Request $request) {
        $data = $this->validateData($request);
        $productId = $this->validateProductId($request);

        $product = Product::find($productId);
        $product->update($data);
    }

    public function delete(Request $request) {
        $productId = $this->validateProductId($request);
        Product::find($productId)->delete();
    }

    private function validateData($request) {
        return $request->validate([
            'name'=>'required|min:25|max:800',
            'price'=>'required|numeric|between:0,999999.99',
            'description'=>'sometimes|max:4000',
            'image'=>'sometimes|max:2000'
        ]);
    }

    private function validateProductId($request) {
        return $request->validate(['product_id'=>'required|exists:products,id'])['product_id'];
    }
}
