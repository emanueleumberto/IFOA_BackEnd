<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        // GET	/posts -> index
        // Soluzione 1
        /* $sql = 'SELECT * FROM posts';
        if($request->has('id')){
            $sql .= ' WHERE id = ' . $request->get('id');
            $res = DB::select($sql);
            $obj = array_pop($res);
            return view('postdetail', ['post' => $obj]); // Ritorna una vista
            //return $obj; // Ritorna un API
        } else {
            $res = DB::select($sql);
            return view('posts', ['posts' => $res]);
        } */

        // Soluzione 2
        /* $queryBuilder = DB::table('posts');
        if($request->has('id')){
            $queryBuilder->where('id', '=', $request->get('id'));
        } */

        // Soluzione 3
        $queryBuilder = Post::orderBy('id');
        if($request->has('id')){
            $queryBuilder->where('id', '=', $request->get('id'));
        }

        //return $queryBuilder->get();
        return view('posts', ['posts' => $queryBuilder->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {

        return view('newpost', ['users' => User::get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {

        $data = $request->only(['title', 'description']);
        $data['post_thumb'] = 'https://picsum.photos/id/'.fake()->randomNumber(2).'/200/300';
        $data['user_id'] = User::get()->random()->id;
        $data['created_at'] = Carbon::now();

        // Soluzione 1
        /* $sql = 'INSERT INTO posts (title, description, post_thumb, user_id, created_at)
                VALUES (:title, :description, :post_thumb, :user_id, :created_at)';
        $res = DB::update($sql, $data);
        //return $res ? 'Post Created' : 'Post not found!!!';
        return redirect()->action([PostController::class, 'index']); */

        // Soluzione 2
        //$queryBuilder = DB::table('posts')->insert($data);

        // Soluzione 3
        $queryBuilder = Post::create($data);

        //return $queryBuilder ? 'Post Created' : 'Post not found!!!';
        return redirect()->action([PostController::class, 'index']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post) {
        //return 'PostController method --show ';
        return view('postdetail', ['post' => $post]); // Ritorna una vista
        // return $post; // Ritorna un API
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post) {
        //return 'PostController method --edit';
        return view('editpost', ['post' => $post]);
    }

    public function postupdate(Request $request) {

        $data = $request->only(['title', 'description', 'id']);
        $data['updated_at'] = Carbon::now();

        // Soluzione 1
        /* $sql = 'UPDATE posts SET title = :title, description = :description, updated_at = :updated_at WHERE id = :id';
        $res = DB::update($sql, $data); */

        // Soluzione 2
        $queryBuilder = DB::table('posts')->where('id', '=', $request->get('id'))->update($data);

        //return $queryBuilder ? 'Post Updated' : 'Post not found!!!';
        return redirect()->action([PostController::class, 'index']);
    }

    public function postdestroy(int $id) {
        /* $sql = 'DELETE FROM posts WHERE id = :id';
        $res = DB::delete($sql, ['id' => $id]); */

        $queryBuilder = DB::table('posts')->delete($id);

        //return $queryBuilder ? 'Post Deleted' : 'Post not found!!!';
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post) {
        // Per adesso lo ignoro perche non sto facendo chiamate Ajax

        $data = $request->only(['title', 'description', 'id']);
        $data['updated_at'] = Carbon::now();

        // Soluzione 3
        $queryBuilder = $post->update($data);
        return $queryBuilder ? 'Post Updated' : 'Post not found!!!';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post) {
        // Per adesso lo ignoro perche non sto facendo chiamate Ajax

        // Soluzione 3
        $queryBuilder = $post->delete();
        return $queryBuilder ? 'Post Updated' : 'Post not found!!!';
    }
}
