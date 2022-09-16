@extends('layout')

@section('title', 'Authors list')

@section('content')
<a class="btn btn-primary" role="button" href='{{ route("authors.create") }}'>Create</a>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Author</th>
        <th scope="col"># of books</th>
        </tr>
    </thead>
    <tbody>
        @foreach($authors as $author)
        <tr>
            <th scope="row">{{ $author->id }}</th>
            <td>
                <a style='text-decoration: none;' href="{{ route('authors.show', $author) }}">{{ $author->name }}</a>
            </td>
            <!-- <td>
                <a style='text-decoration: none;' href="{{ route('authors.show', $author) }}">{{ $author->name }}</a>
            </td> -->
            <td>
                <form method="POST" action="{{ route('authors.destroy', $author) }}">
                    <a class="btn btn-outline-primary" role="button" href='{{ route("authors.edit", $author) }}'>Edit</a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-primary" type='submit'>Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>

    {{ $authors->links() }}
@endsection