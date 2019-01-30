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

    public function test_an_authenticated_user_can_create_comment()
    {
        $this->post->addComment([
            'user_id' => 1,
            'body' => 'foo',
        ]);
        $this->assertCount(1, $this->post->comment);
    }
}
