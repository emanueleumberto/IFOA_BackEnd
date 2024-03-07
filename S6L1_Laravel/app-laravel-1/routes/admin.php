<?php

use Illuminate\Support\Facades\Route;
    // Creo un gruppo di rotte separate da quelle in web
    Route::get('/testAdmin', function () {
        return view('admin');
    });

    // Utilizzare le rotte parametriche con validazione
    Route::get('/testAdmin/{name}/{lastname}/{email}/{age?}', function (string $name, string $lastname, string $email, int $age=18) {
        $u = new stdClass();
        //$u->name = 'Mario';
        //$u->lastname = 'Rossi';
        //$u->city = 'San Francisco';
        $u->name = $name;
        $u->lastname = $lastname;
        $u->age = $age;
        $u->email = $email;

        return view('user', ['obj' => $u]);
    })  -> whereAlpha('name')
        -> whereNumber('age')
        -> where('email', '[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}');

