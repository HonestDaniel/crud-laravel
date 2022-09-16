@extends('layout')

@section('title', isset($book) ? 'Edit a book' : 'Add a book')

@section('content')
    <a class="btn btn-primary" href='{{ route("books.index") }}'>Back to list</a>
    <hr>
    <form method = 'POST'
        @if(isset($book))
        action='{{ route("books.update", $book) }}'
        @else
        action='{{ route("books.store") }}'
        @endif>
        @csrf
        @isset($book)
            @method('PUT')
        @endisset
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Book title</label>
            <input name = 'title'
            value='{{ isset($book) ? $book->title : null}}' 
            type="text" class="form-control" id="formGroupExampleInput" placeholder="Type book title here">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Author name</label>
            <input name = 'name'
            value='{{ isset($book) ? $book->name : null}}' 
            type="text" class="form-control" id="formGroupExampleInput2" placeholder="Type author name here">
        </div>
        <button type="submit" class="btn btn-primary">{{isset($book) ? "Edit!" : "Add a book!"}}</button>
    </form>
@endsection