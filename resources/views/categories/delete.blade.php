<!-- resources/views/categories/delete.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Delete Category</h1>

    <p>Are you sure you want to delete this category?</p>

    <form action="{{ route('categories.destroy', $category->id) }}" method="post">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger">Delete</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
