<div class="product-component">
	<div class="image-container">
		<img src="{{ $product->image }}" class="image" alt="">
	</div>
    <div class="meta-box">
		<div class="align-center" style="gap: 6px; font-size: 12px !important;">
			<a href="{{ route('view-product', ['product'=>$product->id]) }}" class="black-link">view</a>
        	<a href="{{ route('edit-product', ['product'=>$product->id]) }}" class="black-link">edit</a>
        	<a href="{{ route('delete-product', ['product'=>$product->id]) }}" class="black-link">delete</a>
		</div>
    	<p class="title">{{ $product->name }}</p>
		<p class="description">description : {{ $product->description }}</p>
		<p class="description">price : <strong>{{ $product->price }}$</strong></p>
		<div class="fs13">
			<span>categories: </span>
			<div class="flex bold" style="gap: 6px;">
				@foreach($product->categories as $category)
				<span>{{ $category->name }}</span>
				@endforeach
			</div>

			@if(!$product->categories->count())
			<em>This product has no categories</em>
			@endif
		</div>
    </div>
</div>