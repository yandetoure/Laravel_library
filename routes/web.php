<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\ShelveController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('login');
});


Route::prefix('categories')->name('categories.')->middleware('auth')->group(function () {
    Route::get('/show', [CategorieController::class, 'index'])->name('show');
    Route::get('/create', [CategorieController::class, 'create'])->name('create');
    Route::post('/', [CategorieController::class, 'store'])->name('store');
    Route::get('/{categorie}/edit', [CategorieController::class, 'edit'])->name('edit');
    Route::put('/{categorie}', [CategorieController::class, 'update'])->name('update');
    Route::delete('/{categorie}', [CategorieController::class, 'destroy'])->name('destroy');
});
Route::prefix('autors')->name('autors.')->middleware('auth')->group(function () {
    Route::get('/show', [AutorController::class, 'index'])->name('show');
    Route::get('/create', [AutorController::class, 'create'])->name('create');
    Route::post('/', [AutorController::class, 'store'])->name('store');
    Route::get('/{autor}/edit', [AutorController::class, 'edit'])->name('edit');
    Route::put('/{autor}', [AutorController::class, 'update'])->name('update');
    Route::delete('/{autor}', [AutorController::class, 'destroy'])->name('destroy');
});
Route::prefix('publishers')->name('publishers.')->middleware('auth')->group(function () {
    Route::get('/show', [PublisherController::class, 'index'])->name('show');
    Route::get('/create', [PublisherController::class, 'create'])->name('create');
    Route::post('/', [PublisherController::class, 'store'])->name('store');
    Route::get('/{publisher}/edit', [PublisherController::class, 'edit'])->name('edit');
    Route::put('/{publisher}', [PublisherController::class, 'update'])->name('update');
    Route::delete('/{publisher}', [PublisherController::class, 'destroy'])->name('destroy');
});
Route::prefix('shelves')->name('shelves.')->middleware('auth')->group(function () {
    Route::get('/show', [ShelveController::class, 'index'])->name('show');
    Route::get('/create', [ShelveController::class, 'create'])->name('create');
    Route::post('/', [ShelveController::class, 'store'])->name('store');
    Route::get('/{shelve}/edit', [ShelveController::class, 'edit'])->name('edit');
    Route::put('/{shelve}', [ShelveController::class, 'update'])->name('update');
    Route::delete('/{shelve}', [ShelveController::class, 'destroy'])->name('destroy');
});
Route::prefix('books')->name('books.')->middleware('auth')->group(function () {
    Route::get('/show', [BookController::class, 'index'])->name('show');
    Route::get('/books/{id}/more', [BookController::class, 'more'])->name('more');
    Route::get('/create', [BookController::class, 'create'])->name('create');
    Route::post('/', [BookController::class, 'store'])->name('store');
    Route::get('/{book}/edit', [BookController::class, 'edit'])->name('edit');
    Route::put('/{book}', [BookController::class, 'update'])->name('update');
    Route::delete('/{book}', [BookController::class, 'destroy'])->name('destroy');
});
Route::prefix('students')->name('students.')->middleware('auth')->group(function () {
    Route::get('/show', [StudentController::class, 'index'])->name('show');
    Route::get('/create', [StudentController::class, 'create'])->name('create');
    Route::post('/', [StudentController::class, 'store'])->name('store');
    Route::get('/{student}/edit', [StudentController::class, 'edit'])->name('edit');
    Route::put('/{student}', [StudentController::class, 'update'])->name('update');
    Route::delete('/{student}', [StudentController::class, 'destroy'])->name('destroy');
});

Route::get('/signup', [AuthController::class,'signup'])->name('signup');
Route::post('/signup', [AuthController::class, 'signupPost'])->name('signup');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login');

Route::delete('logout', [AuthController::class, 'logout'])->name('logout');