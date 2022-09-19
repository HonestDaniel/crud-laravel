<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB; 

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(/*Request $request*/)
    {
        $books = Book::paginate(20);
        return view('index', compact('books'));
        // $table = Author::where('name', $request->name)->first();
        // if ($table == NULL) return response()->json('OK');
    }

    public function create()
    {
        return view('form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only(['title']);
        $name = $request->only(['name']);
        $author = DB::table('authors')->select('*')->where('name', $name)->get()->first();
        if ($author) {
            $data['author_id'] = $author->id;
        } else {
            $data['author_id'] = DB::table('authors')->insertGetId([
                'name' => $name['name']
            ]);
        }
        // print_r($data);
        $result = Book::create($data);
        return redirect()->route('books.index');
        // Book::create($request->only(['title']));
        // return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Book $author
     * @return \Illuminate\Contracts\Foundation\Application\Illuminate\Contracts\View\Factory\Illuminate\Contracts\View\View
     */
    public function show(Book $book)
    {
        return view('show', compact('book'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */

    public function edit(Book $book)
    {
        return view('form', compact('book'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $book->update($request->only(['title', 'name']));
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}
