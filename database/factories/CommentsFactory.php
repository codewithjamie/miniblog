<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Posts;
use App\Models\Comments;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comments>
 */
class CommentsFactory extends Factory
{
    protected $model = Comments::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'comment' => $this->faker->paragraph(5),
            'post_id' => Str::random(10),
            'user_id' => Str::random(10),
            'author_id' => Str::random(10),
            'status' => 'published',
            'like_count' => 0,
            'reply_count' => 0
        ];
    }
}
