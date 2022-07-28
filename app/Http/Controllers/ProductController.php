<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    protected $imageMimes = 'jpeg,png,jpg,gif,svg,jfif,bmp,tiff'; // images

    public function index(Request $request) {

    }

    public function view(Request $request) {
        
    }

    public function create(Request $request) {
        $data = $request->validate([
            'name'=>'required|min:25|max:800',
            'price'=>'required|numeric|between:0,999999.99',
            'description'=>'required|max:4000',
        ]);

        $product = Product::create($data);

        // Store the image if exists
        if($request->has('image')) {
            $image = $request->validate(['image'=>"mimes:$this->imageMimes|max:8000"])['image'];
            $image->storeAs("products/$product->id/images", "$product->id-image.png", 'public');
        }
        
        if($request->has('categories')) {
            $categories = $this->validateCategories($request);
            $product->categories()->syncWithoutDetaching($categories);
        }
    }

    public function edit(Request $request) {
        
    }

    public function update(Request $request) {
        $data = $request->validate([
            'name'=>'sometimes|min:25|max:800',
            'price'=>'sometimes|numeric|between:0,999999.99',
            'description'=>'sometimes|max:4000',
        ]);
        $productId = $this->validateProductId($request);

        $product = Product::find($productId);
        $product->update($data);

        // Update the image if admin change the product's image
        if($request->has('image')) {
            $image = $request->validate(['image'=>"mimes:$this->imageMimes|max:8000"])['image'];
            $image->storeAs("products/$product->id/images", "$product->id-image.png", 'public');
        }

        if($request->has('categories')) {
            $categories = $this->validateCategories($request);
            $product->categories()->sync($categories);
        }
    }

    public function delete(Request $request) {

    }

    public function destroy(Request $request) {
        $productId = $this->validateProductId($request);
        Product::find($productId)->delete();
    }

    private function validateCategories($request) {
        return $request->validate([
            'categories'=>'required|array',
            'categories.*'=>'exists:categories,id'
        ])['categories'];
    }

    private function validateProductId($request) {
        return $request->validate(['product_id'=>'required|exists:products,id'])['product_id'];
    }
}
