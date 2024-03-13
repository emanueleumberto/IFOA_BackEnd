<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::resource('/', BookController::class);
Route::resource('/author', AuthorController::class);
Route::resource('/category', CategoryController::class);
