<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Posts;
use App\Models\User;
use App\Models\Comments;

class CommentsTest extends TestCase
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

        $comment = Comments::factory()->create();

        $this->assertNotNull($comment);
        $this->assertEquals(1, Comments::count());
    }
}
