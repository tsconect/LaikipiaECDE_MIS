<?php

namespace Database\Factories;

use App\Models\FAQ;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FAQ>
 */
class FAQFactory extends Factory
{
    protected $model = FAQ::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'question' => $this->faker->sentence() . '?',
            'answer' => '<p>' . implode('</p><p>', $this->faker->paragraphs(2)) . '</p>',
            'order' => $this->faker->numberBetween(1, 20),
            'status' => 'published',
        ];
    }
}
