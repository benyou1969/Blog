<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateCommentsTest extends TestCase
{
    use DatabaseMigrations;
    public function setUp()
    {
        parent::setUp();
        $this->post = factory('App\Post')->create();
    }

    public function test_a_user_can_create_comment()
    {
        $this->post->addComment([
            'user_id' => 1,
            'body' => 'foo',
        ]);
        $this->assertCount(1, $this->post->comment);
    }

    public function test_an_authenticated_user_can_add_comment()
    {
        $this->be($user = factory('App\User')->create());
        $comment = factory('App\Comment')->create(['post_id' => $this->post->id]);
        $this->post($this->post->path().'/comments', $comment->toArray());
        $this->get($this->post->path())
             ->assertSee($comment->body);
    }
}
