<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReadCommentsTest extends TestCase
{
    /**
     * A user can read comments
     *
     * @return void
     */
    use DatabaseMigrations;
    public function setUp()
    {
        parent::setUp();
        $this->post = create('App\Post');
        $this->comment = create('App\Comment', 'create', ['post_id' => $this->post->id]);
    }
    public function test_a_user_can_see_all_comments()
    {
        $response = $this->get($this->post->path())
        ->assertSee($this->comment->body);
    }
    public function test_a_comment_has_an_owner()
    {
        $response = $this->get($this->post->path())
        ->assertSee($this->comment->owner->name);
    }
}
