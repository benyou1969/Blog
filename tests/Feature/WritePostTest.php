<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class WritePostTest extends TestCase
{
    use DatabaseMigrations;

    public function test_an_authenticated_user_can_create_a_post()
    {
        $this->signIn();
        $post = create('App\Post');
        $this->post('/posts', $post->toArray());
        $this->get($post->path())
            ->assertSee($post->title)
            ->assertSee($post->body);
    }
}
