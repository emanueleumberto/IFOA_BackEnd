<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index() {
        $sql = 'SELECT * FROM posts';
        return DB::select($sql);
    }
}
