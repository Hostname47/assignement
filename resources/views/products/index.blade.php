@extends('layouts.app')

@section('title', 'index')

@section('content')
    <div class="align-center" style="gap: 12px;">
        <h1>Products</h1>
        <a href="{{ route('add-product') }}" class="black-link">create a new product</a>
    </div>

    <div id="products-box">
        @foreach($products as $product)
        <x-product-component :product="$product" />
        @endforeach
    </div>
    
    {{ $products->links() }}

    @if(!$products->count())
    <p class="fs13">There's no products for the moment. Click on create button above to create new products</p>
    @endif
@endsection