@extends('layouts.app')

@section('title', 'view')

@section('content')
    <h1>-- {{ $category->name }} --</h1>
    
    <div class="align-center" style="gap: 12px;">
        <h3>Products on that category</h3>
        <a href="{{ route('edit-category', ['category'=>$category->id]) }}" class="black-link">edit</a>
        <a href="{{ route('delete-category', ['category'=>$category->id]) }}" class="black-link">delete</a>
    </div>

    @foreach($products as $product)
    <div>
        
    </div>
    @endforeach

    @if(!$products->count())
    <p class="fs13">There's no products associated to this category go to products section in header and select add a product to start creating new products.</p>
    @endif
@endsection