<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $post = new Post();
        $post->title  = 'Welcome Post';
        $post->post = "Welcome to the site , This is a new post created by seed file";
        $post->user_id = 1;
        $post->save();

        $post = new Post();
        $post->title  = 'Another Welcome Post';
        $post->post = "Welcome to the site , This is a second post created by seed file";
        $post->user_id = 1;
        $post->save();
    }
}
