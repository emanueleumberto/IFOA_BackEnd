<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {

    public $users = [
        ['id' => 1, 'fullname' => 'John Smith', 'username' => 'JohnSmith', 'email' => 'john.smith@example.com', 'password'=> 'Pa$$w0rd!'],
        ['id' => 2, 'fullname' => 'Mario Rossi', 'username' => 'MarioMario', 'email' => 'mario.rossi@example.com', 'password'=> 'Pa$$w0rd!']
    ];

    public $msg = 'Welcome to the Alert';

    /**
     * Display a listing of the resource.
     */
    public function index() {
        //return view('users', ['title' => 'User List', 'users' => $this->users]);
        //return view('users') -> withTitle('User List') -> withUsers($this->users);

        // vista con l'uso del template blade
        return view('users2', ['title' => 'User List', 'users' => $this->users, 'msg' => $this->msg]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createUser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user){
        return '<h1>Show</h1>';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
