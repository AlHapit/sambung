<?php

namespace Database\Factories;

use App\Models\Participation;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Participation>
 */
class ParticipationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'event_id' => Event::factory()->open(),
            'user_id' => User::factory(),
            'status' => 'joined',
            'joined_at' => now()->subDays(2),
            'completed_at' => null,
        ];
    }

    public function joined(): static
    {
        return $this->state(fn (array $attributes) => ['status' => 'joined', 'joined_at' => now()->subDay(), 'completed_at' => null]);
    }

    public function attended(): static
    {
        return $this->state(fn (array $attributes) => [
            'event_id' => Event::factory()->completed(),
            'status' => 'attended',
            'joined_at' => now()->subDays(10),
            'completed_at' => now()->subDays(7),
        ]);
    }

    public function cancelled(): static
    {
        return $this->state(fn (array $attributes) => [
            'event_id' => Event::factory()->cancelled(),
            'status' => 'cancelled',
            'joined_at' => now()->subDays(3),
            'completed_at' => null,
        ]);
    }
}
