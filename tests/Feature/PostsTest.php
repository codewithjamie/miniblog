<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Posts;
use App\Models\Comments;

class PostsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_checking_posts_page()
    {
        $this->withoutExceptionHandling();

        $posts = Posts::factory()->create();

        $this->assertNotNull($posts);
        $this->assertEquals(1, Posts::count());
    }
}
