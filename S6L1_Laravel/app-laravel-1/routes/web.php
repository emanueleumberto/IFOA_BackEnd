<?php

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

// Rotta predefinita di Laravel
Route::get('/', function () {
    return view('welcome');
});

// Rotta in cui restituisco qualcosa
Route::get('/greeting', function () {
    return '<h1>Hello World</h1>';
});

// Http Method multipli
Route::match(['get', 'post'], '/match', function () {
    return '<h1>Hello Match</h1>';
});

// Rotta in cui restituisco delle API in formato JSON
Route::get('/usersAPI', function () {
    $users = [];
    $u = new stdClass();
    $u->name = 'Mario';
    $u->lastname = 'Rossi';
    $u->city = 'San Francisco';
    array_push($users, $u);
    return $users;
});

// Redirect su una route diversa
Route::redirect('/here', '/greeting', 301);



