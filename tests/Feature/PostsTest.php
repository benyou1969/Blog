<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class PostsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_a_user_can_browse_all_posts()
    {
        $post = factory('App\Post')->create();
        $resposne = $this->get('/posts');
        $resposne->assertSee($post->title);
    }
    public function test_a_user_can_read_a_single_post()
    {
        $post = factory('App\Post')->create();
        $resposne = $this->get('/posts/'. $post->id);
        $resposne->assertSee($post->title, $post->body);
    } 
}
