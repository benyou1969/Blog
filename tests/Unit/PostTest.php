<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PostTest extends TestCase
{
    use DatabaseMigrations;
    public function test_a_post_has_a_path_contains_channel()
    {
        $post = create('App\Post');
        $this->assertEquals(
            $post->path(),
            "/p/{$post->community->slug}/{$post->id}"
        );
    }
}
