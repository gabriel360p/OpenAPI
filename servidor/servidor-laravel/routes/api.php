<?php

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('books',function(){
    $books = Book::all();
    return response($books,200);
});

Route::post('books',function(Request $request){
    Book::create($request->all());
    return response(201);
});

Route::delete('books/{book}',function(Request $request, Book $book){
    $book->delete();
    return response(200);
});

Route::put('books/{book}',function(Request $request, Book $book){
    $book->update($request->all());
    return response(200);
});