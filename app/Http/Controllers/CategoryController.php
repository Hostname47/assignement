<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request) {
        $categories = Category::all();
        return view('categories.index')
            ->with(compact('categories'));
    }

    public function view(Request $request) {
        $categoryId = $request->validate(['category'=>'required|exists:categories,id'])['category'];
        $category = Category::find($categoryId);
        $products = $category->products;

        return view('categories.view')
            ->with(compact('category'))
            ->with(compact('products'));
    }

    public function add(Request $request) {
        return view('categories.add');
    }

    public function create(Request $request) {
        $data = $request->validate(['name' => 'required|unique:categories,name|max:1200']);
        $category = Category::create($data);

        return redirect()->route('categories')->with('message', 'category ' . $category->name . ' has been created successfully');
    }

    public function edit(Request $request) {
        $categoryId = $request->validate(['category'=>'required|exists:categories,id'])['category'];
        $category = Category::find($categoryId);

        return view('categories.edit')
            ->with(compact('category'));
    }

    public function update(Request $request) {
        $data = $this->validateCategory($request);
        $categoryId = $this->validateCategoryId($request);
        
        Category::find($categoryId)->update($data);

        return redirect()->route('edit-category', ['category'=>$categoryId]);
    }

    public function delete(Request $request) {
        $categoryId = $request->validate(['category'=>'required|exists:categories,id'])['category'];
        $category = Category::find($categoryId);

        return view('categories.delete')
            ->with(compact('category'));
    }

    public function destroy(Request $request) {
        $categoryId = $this->validateCategoryId($request);
        Category::find($categoryId)->delete();

        return redirect()->route('categories')->with('message', 'Category ' . $category->name . ' has been deleted successfully');
    }

    private function validateCategory($request) {
        return $request->validate(['name' => 'required|max:1200']);
    }

    private function validateCategoryId($request) {
        return $request->validate(['category_id' => 'required|exists:categories,id'])['category_id'];
    }
}
