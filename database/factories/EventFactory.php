<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\User;
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
            'organizer_id' => User::factory()->organizer(),
            'title' => fake()->sentence(4),
            'description' => fake()->paragraph(2),
            'category' => fake()->randomElement(['Lingkungan', 'Pendidikan', 'Teknologi', 'Budaya', 'Kesehatan']),
            'location' => fake()->randomElement(['Balai Warga RW 05', 'Taman Komunitas', 'Aula Kelurahan', 'Rumah Belajar Sambung']),
            'latitude' => fake()->randomFloat(7, -6.35, -6.15),
            'longitude' => fake()->randomFloat(7, 106.70, 106.95),
            'event_date' => now()->addDays(fake()->numberBetween(7, 45)),
            'status' => 'open',
            'max_participants' => fake()->numberBetween(15, 60),
        ];
    }

    public function draft(): static
    {
        return $this->state(fn (array $attributes) => ['event_date' => now()->addDays(21), 'status' => 'draft']);
    }

    public function open(): static
    {
        return $this->state(fn (array $attributes) => ['event_date' => now()->addDays(14), 'status' => 'open']);
    }

    public function cancelled(): static
    {
        return $this->state(fn (array $attributes) => ['event_date' => now()->addDays(7), 'status' => 'cancelled']);
    }

    public function completed(): static
    {
        return $this->state(fn (array $attributes) => ['event_date' => now()->subDays(7), 'status' => 'completed']);
    }
}
