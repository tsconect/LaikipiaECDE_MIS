<?php

namespace Database\Factories;

use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimonial>
 */
class TestimonialFactory extends Factory
{
    protected $model = Testimonial::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'position' => $this->faker->jobTitle(),
            'message' => $this->faker->paragraph(),
            'organization' => $this->faker->company(),
            'rating' => $this->faker->numberBetween(3, 5),
            'status' => 'approved',
            'order' => $this->faker->numberBetween(1, 10),
        ];
    }
}
