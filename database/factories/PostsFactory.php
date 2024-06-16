<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Posts;
use App\Models\User;

class PostsFactory extends Factory
{
    protected $model = Posts::class;

    public function definition()
    {
        $title = $this->faker->sentence(2);

        return [
            'title' => $this->faker->text(),
            'permalink' => Str::slug($title, '-'),
            'description' => $this->faker->paragraph,
            'content' => $this->faker->paragraphs(3, true),
            'image' => $this->faker->imageUrl(),
            'published_at' => now(),
            'status' => 'published',
            'author_id' => Str::random(5),
        ];
    }
}
