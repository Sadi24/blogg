<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
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
        $post->title = Str::random(10);
        $post->body = Str::random(10);
        $post->save();
        // $post->tags()->attach([1,2]);

    }
}
