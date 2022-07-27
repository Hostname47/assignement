<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request) {

    }

    public function category(Request $request) {

    }

    public function create(Request $request) {
        $data = $request->validate(['name' => 'required|max:1200']);
        Category::create($data);
    }

    public function update(Request $request) {
        $data = $this->validateCategory($request);
        $categoryId = $this->validateCategoryId($request);
        
        Category::find($categoryId)->update($data);
    }

    public function delete(Request $request) {
        $categoryId = $this->validateCategoryId($request);
        Category::find($categoryId)->delete();
    }

    private function validateCategory($request) {
        return $request->validate(['name' => 'required|max:1200']);
    }

    private function validateCategoryId($request) {
        return $request->validate(['category_id' => 'required|exists:categories,id'])['category_id'];
    }
}
