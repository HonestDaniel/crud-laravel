@extends('layout')

@section('title', 'Author')

@section('content')
<a class="btn btn-primary" href='{{ route("authors.index") }}'>Back to list</a>
<hr>
<div class="card" style="width: 18rem;">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Id: {{$author->id}}</li>
    <li class="list-group-item">Author: {{ $author->name }}</li>
  </ul>
</div>
<form class='mt-2' method="POST" action="{{ route('authors.destroy', $author) }}">
    <a class="btn btn-outline-primary" role="button" href='{{ route("authors.edit", $author) }}'>Edit</a>
        @csrf
        @method('DELETE')
    <button class="btn btn-outline-primary" type='submit'>Delete</button>
</form>
@endsection