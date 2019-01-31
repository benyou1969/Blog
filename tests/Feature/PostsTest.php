<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class PostsTest extends TestCase
{
    use DatabaseMigrations;
    public function setUp()
    {
        parent::setUp();
        $this->post = create('App\Post');
    }
    
    public function test_a_user_can_browse_all_posts()
    {
        $resposne = $this->get('/posts');
        $resposne->assertSee($this->post->title);
    }
    public function test_a_user_can_read_a_single_post()
    {
        $resposne = $this->get($this->post->path());
        $resposne->assertSee($this->post->title, $this->post->body);
    } 
    public function test_a_post_has_a_creator()
    {
        $resposne = $this->get($this->post->path())
        ->assertSee($this->post->creator->name);
    }
    public function test_a_user_can_read_comments_those_are_associated_with_post()
    {
        $comment = create('App\Comment','create',["post_id"=> $this->post->id]);
        $resposne = $this->get($this->post->path())
        ->assertSee($comment->body);
    }
}
