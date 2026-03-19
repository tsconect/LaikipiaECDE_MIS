<?php

namespace Database\Factories;

use App\Models\Announcement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Announcement>
 */
class AnnouncementFactory extends Factory
{
    protected $model = Announcement::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = $this->faker->dateTimeBetween('-10 days', 'now');
        $endDate = $this->faker->dateTimeBetween($startDate, '+30 days');
        
        return [
            'title' => $this->faker->sentence(),
            'content' => '<p>' . implode('</p><p>', $this->faker->paragraphs(3)) . '</p>',
            'priority' => $this->faker->numberBetween(1, 10),
            'start_date' => $startDate,
            'end_date' => $endDate,
            'status' => 'published',
        ];
    }
}
