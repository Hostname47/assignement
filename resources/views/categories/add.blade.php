@extends('layouts.app')

@section('title', 'create a new category')

@section('content')
    <h1>Create a new category</h1>

    <p>Specify a name to the category and press create button</p>

    <form action="{{ route('create-category') }}" method="POST">
        @csrf
        <label for="name">
            <span>Category name</span>
            <input type="text" id="name" name="name" placeholder="category name" required>
        </label>
        <button type="submit" id="edit-category" class="flex" style="margin-top: 12px">
            <span>Create category</span>
        </button>
    </form>
@endsection