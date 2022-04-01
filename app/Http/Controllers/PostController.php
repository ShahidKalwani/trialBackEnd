<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //
    public  function index(Request $request) {
        if(!$request->id) {
            $posts = Post::all();
            return response([
                "posts" => $posts
            ], 201);
        }

        $post = Post::find($request->id);
        return response(
            [
                "post" =>  $post
            ], 201);
    }

    public function add(Request $request) {
        $request->validate([
            'title' => 'required',
            'post' => 'required',

        ]);

        $post = new Post;
        $post->title = $request->title;
        $post->post = $request->post;
        $post->user_id =  $request->user()->id;
        if ($post->save()) {
            return response(
                ["message" => 'Added Successfully '],  201);
        }

        return response(
            [
                "message" => "There was some error"
            ],400);
    }

}
