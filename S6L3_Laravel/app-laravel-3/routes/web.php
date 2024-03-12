<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/* Route::get('/users', function () {
    // $users = User::get();
    // return view('users', [ 'users' => $users]);
    return User::get();
}); */

/* Route::get('/users/posts', function () {
    //
    return User::with('posts')->paginate(5);
 }); */

/* Route::get('/posts', function () {
    return Post::get();
}); */

/* Route::get('/posts/{size}/paginate', function (int $size) {
    return Post::paginate($size);
}); */

/* Route::get('/posts', [PostController::class, 'index']);
Route::post('/posts', [PostController::class, 'create']);
Route::put('/posts/{ri}', [PostController::class, 'update']);
Route::delete('/posts/{ri}', [PostController::class, 'destroy']); */

Route::resource('/posts', PostController::class);
Route::post('/posts/update', [PostController::class, 'postupdate']);
Route::get('/posts/{id}/destroy', [PostController::class, 'postdestroy']);


