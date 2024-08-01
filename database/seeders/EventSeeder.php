<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventResource;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::factory()
            ->count(10)
            ->has(
                factory: EventResource::factory()
                    ->count(3),
                relationship: 'resources'
            )
            ->create();
    }
}
