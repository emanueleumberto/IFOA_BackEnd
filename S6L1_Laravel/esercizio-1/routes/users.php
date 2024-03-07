<?php

use Illuminate\Support\Facades\Route;

$users = [];

$u = new stdClass();
$u->id = 1;
$u->fullname = 'Mario Rossi';
$u->username = 'MarioMario';
$u->email = 'mario.rossi@example.com';
$u->password = 'Pa$$w0rd!';
array_push($users, $u);
$g = new stdClass();
$g->id = 2;
$g->fullname = 'Giuseppe Verdi';
$g->username = 'verdino';
$g->email = 'g.verdi@example.com';
$g->password = 'Pa$$w0rd!';
array_push($users, $g);

Route::get('/users', function () use ($users) {
    //return '<h1>Users</h1>';
    return view('users', ['users' => $users]);
});

Route::get('/users/create', function () {
    //return '<h1>Create User</h1>';
    return view('create');
});

Route::get('/users/delete', function () {
    //return '<h1>Delete User</h1>';
    return view('delete');
});

Route::get('/users/{id}', function (int $id = 0) use ($users) {
    //return '<h1>User Detail</h1>';
    $user= array_filter($users, fn($u) => $u->id === $id);
    $u = array_pop($user);
    return view('detail', ['user' => $u]);
});

Route::get('/users/{id}/update', function (int $id = 0) {
    //return '<h1>Update User</h1>';
    return view('update');
});



