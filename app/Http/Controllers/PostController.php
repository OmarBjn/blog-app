<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index()
    {

        $postsFromDB = Post::all();

        return view('posts.index', ['posts' => $postsFromDB]);
    }

    public function show(Post $post)
    {
        /* findOrFail do if the postId does not exist will appears ( 404 NOT FOUND )
           and also this way if we catch just the number and retrive the post manual but there is another easy way 
        $post = Post::findOrFail($postId); */

        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        $users = User::all();

        return view('posts.create', ['users' => $users]);
    }

    public function store(PostRequest $request){

        /* // this is first way to store data to database but its not good
        // request()->validate([
        //     'title' => ['required', 'min:3'],
        //     'description' => ['required', 'min:3'],
        //     'post_creator_id' => ['required', 'exists:users,id'],
        // ]);

        // $title = request()->title;
        // $description = request()->description;
        // $user_id = request()->post_creator_id; 

        // $post = new Post;
        // $post->title = $title;
        // $post->description = $description;
        // $post->user_id = $user_id;
        $post->save(); */

        // this is the second way it is good and secure but you have to add ( $fillable var in Post Model and set PostRequest )
        Post::create($request->validated());
        return to_route('posts.index');
    }

    public function edit(Post $post){
        $users = User::all();

        return view('posts.edit', ['post' => $post, 'users'=>$users]);
    }

    public function update(Post $post, PostRequest $request){

        $post->update($request->validated());

        return to_route('posts.show', $post->id);

    }

    public function destroy(Post $post){

        $post->delete();

        return to_route('posts.index');

    }

}
