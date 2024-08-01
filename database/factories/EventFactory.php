<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'start_date' => ($startDate = $this->faker->date),
            'end_date' => $this->faker->dateTimeBetween($startDate, '+1 week')->format('Y-m-d'),
            'location' => "{$this->faker->city}, {$this->faker->country}",
            'total_attendees' => $this->faker->numberBetween(100, 2000),
            'total_sponsors' => $this->faker->numberBetween(1, 100),
            'total_super_sponsors' => $this->faker->numberBetween(1, 10),
            'theme_color' => $this->faker->hexColor,
        ];
    }
}
