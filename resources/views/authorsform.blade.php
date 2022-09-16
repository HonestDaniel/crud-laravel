@extends('layout')

@section('title', isset($author) ? 'Edit an author' : 'Add an author')

@section('content')
    <a class="btn btn-primary" href='{{ route("authors.index") }}'>Back to list</a>
    <hr>
    <form method = 'POST'
        @if(isset($author))
        action='{{ route("authors.update", $author) }}'
        @else
        action='{{ route("authors.store") }}'
        @endif>
        @csrf
        @isset($author)
            @method('PUT')
        @endisset
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Author name</label>
            <input name = 'name'
            value='{{ isset($author) ? $author->name : null}}' 
            type="text" class="form-control" id="formGroupExampleInput" placeholder="Type author name here">
        </div>
        <button type="submit" class="btn btn-primary">{{isset($author) ? "Edit!" : "Add an author!"}}</button>
    </form>
@endsection