@extends('layouts.app')

@section('title', 'delete')

@section('content')
    <div class="align-center" style="gap: 12px;">
        <h1>Delete {{ $category->name }} category</h1>
        <a href="{{ route('view-category', ['category'=>$category->id]) }}" class="black-link">return to category</a>
    </div>

    <p>Please notice that this action will delete the category permanently. Are you sure you want to delete this category ?</p>
    <p>The category will be detached from all the products once it gets deleted.</p>

    <form action="{{ route('destroy-category') }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="category_id" value="{{ $category->id }}">
        <button type="submit" id="edit-category" class="flex" style="margin-top: 12px">
            <span>Delete category</span>
        </button>
    </form>
@endsection