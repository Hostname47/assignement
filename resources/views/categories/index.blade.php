@extends('layouts.app')

@section('title', 'index')

@section('content')
    <div class="align-center" style="gap: 12px">
        <h1>Categories</h1>
        <a href="{{ route('add-category') }}" class="black-link">create a new category</a>
    </div>
    @foreach($categories as $category)
    <div class="category" style="margin-top: 12px">
        <a href="{{ route('view-category', ['category'=>$category->id]) }}" class="link">{{ $category->name }}</a>
        <div class="align-center" style="gap: 12px">
            <a href="{{ route('edit-category', ['category'=>$category->id]) }}" class="black-link fs13">edit</a>
            <a href="{{ route('delete-category', ['category'=>$category->id]) }}" class="black-link fs13">delete</a>
        </div>
    </div>
    @endforeach

    @if(!$categories->count())
    <p class="fs13">There's no categories for the moment. Click on create button above to create new categories</p>
    @endif
@endsection