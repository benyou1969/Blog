<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = factory('App\Post', 20)->create();
        $post->each(function ($post) { factory('App\Comment', 10)->create(['post_id' => $post->id]);});
    }
}
