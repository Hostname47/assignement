@extends('layouts.app')

@section('title', 'edit')

@section('content')
    <h1>{{ $category->name }} category</h1>
    
    <div class="align-center" style="gap: 12px;">
        <h3>Edit category</h3>
        <a href="{{ route('view-category', ['category'=>$category->id]) }}" class="black-link">view</a>
        <a href="{{ route('delete-category', ['category'=>$category->id]) }}" class="black-link">delete</a>
    </div>

    <form action="{{ route('update-category') }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PATCH">
        <p>Current category name: <strong>{{ $category->name }}</strong></p>
        <label for="name">
            <span>Category name</span>
            <input type="text" id="name" name="name" placeholder="the new name" required>
        </label>
        <input type="hidden" name="category_id" value="{{ $category->id }}">
        <button type="submit" id="edit-category" class="flex" style="margin-top: 12px">
            <span>Edit category</span>
        </button>
    </form>
@endsection