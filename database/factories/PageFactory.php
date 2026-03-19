<?php

namespace Database\Factories;

use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
{
    protected $model = Page::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(4);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => '<p>' . implode('</p><p>', $this->faker->paragraphs(5)) . '</p>',
            'meta_description' => $this->faker->sentence(),
            'created_by' => 1,
            'status' => 'published',
        ];
    }
}
