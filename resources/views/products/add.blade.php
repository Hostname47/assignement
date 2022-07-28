@extends('layouts.app')

@section('title', 'add a new product')

@section('content')
    <style>
        label {
            display: flex;
            gap: 8px;
        }
    </style>
    <h1>Add a new product</h1>

    <form action="{{ route('create-product') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name" class="flex my8">
            <span>product name</span>
            <input type="text" id="name" name="name" placeholder="product name" class="flex" value="{{ old('name') }}" required>
        </label>
        <label for="description" class="flex my8">
            <span>product description</span>
            <input type="text" id="description" name="description" placeholder="product description" class="flex" value="{{ old('description') }}" required>
        </label>
        <label for="price" class="flex my8">
            <span>product price</span>
            <input type="numeric" id="price" name="price" placeholder="product price" class="flex" value="{{ old('price') }}" required>
        </label>
        <label for="categories" class="flex my8">
            <span>Categories</span>
            <select name="categories[]" id="categories" multiple='multiple' value="{{ old('categories') }}">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </label>
        <label for="image" class="flex my8">
            <span>product image</span>
            <input type="file" id="image" name="image" placeholder="product image" class="flex" value="{{ old('image') }}" required>
        </label>
        <button type="submit" class="flex" style="margin-top: 12px">
            <span>Create a product</span>
        </button>
    </form>
@endsection