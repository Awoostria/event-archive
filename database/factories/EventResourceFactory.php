<?php

namespace Database\Factories;

use App\Enums\EventResourceType;
use App\Models\Event;
use App\Models\EventResource;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<EventResource>
 */
class EventResourceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'event_id' => Event::factory(),
            'order_column' => $this->faker->randomNumber(),
            'type' => $this->faker->randomElement(EventResourceType::cases()),
            'label' => $this->faker->word(),
            'url' => 'https://example.com',
        ];
    }
}
