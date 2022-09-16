<?php

use \App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('books', BookController::class);
// Route::resource(name: 'books', controller: 'Account\BooksController');
// Route::get(uri: '/books/{uuid}/download', action: 'BookController@download')->name(name: 'books.download');