@extends('layout')

@section('title', 'Books list')

@section('content')
    <a class="btn btn-primary" role="button" href='{{ route("books.create") }}'>Create</a>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Author</th>
        </tr>
    </thead>
    <tbody>
        @foreach($books as $book)
        <tr>
            <th scope="row">{{ $book->id }}</th>
            <td>
                <a style='text-decoration: none;' href="{{ route('books.show', $book) }}">{{ $book->title }}</a>
            </td>
            <td>
                <a style='text-decoration: none;' href="{{ route('books.show', $book) }}">{{ $book->name }}</a>
            </td>
            <td>
                <form method="POST" action="{{ route('books.destroy', $book) }}">
                    <a class="btn btn-outline-primary" role="button" href='{{ route("books.edit", $book) }}'>Edit</a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-primary" type='submit'>Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>

    {{ $books->links() }}
@endsection