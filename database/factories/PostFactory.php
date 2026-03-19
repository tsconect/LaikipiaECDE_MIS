<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(5);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => '<p>' . implode('</p><p>', $this->faker->paragraphs(8)) . '</p>',
            'author_id' => 1,
            'published_at' => $this->faker->dateTimeBetween('-30 days', 'now'),
            'status' => 'published',
            'views_count' => $this->faker->numberBetween(0, 500),
        ];
    }
}
