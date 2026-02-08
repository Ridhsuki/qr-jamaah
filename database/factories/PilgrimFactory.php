<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PilgrimFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'passport_number' => 'E' . fake()->unique()->numerify('#######'),
            'umrah_id' => fake()->unique()->numerify('###########'),
            'ppiu' => fake()->company(),
            'hotel_name' => fake()->city() . ' Hotel',
            'check_in' => fake()->dateTimeBetween('now', '+1 week'),
            'check_out' => fake()->dateTimeBetween('+1 week', '+2 weeks'),
        ];
    }
}
