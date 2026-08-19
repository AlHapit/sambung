<?php

namespace Database\Factories;

use App\Models\Connection;
use App\Models\Need;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Connection>
 */
class ConnectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'need_id' => Need::factory(),
            'mentor_id' => User::factory(),
            'mentee_id' => fn (array $attributes): int => Need::findOrFail($attributes['need_id'])->user_id,
            'status' => 'pending',
            'requested_at' => now()->subDay(),
            'accepted_at' => null,
            'completed_at' => null,
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Connection $connection): void {
            $need = $connection->need;

            if ($connection->status === 'connected') {
                $need->update(['status' => 'matched']);
            }

            if ($connection->status === 'completed') {
                $need->update(['status' => 'completed']);
            }
        });
    }

    public function pending(): static
    {
        return $this->state(fn (array $attributes) => ['status' => 'pending', 'requested_at' => now()->subDay(), 'accepted_at' => null, 'completed_at' => null]);
    }

    public function connected(): static
    {
        return $this->state(fn (array $attributes) => ['status' => 'connected', 'requested_at' => now()->subDays(7), 'accepted_at' => now()->subDays(6), 'completed_at' => null]);
    }

    public function completed(): static
    {
        return $this->state(fn (array $attributes) => ['status' => 'completed', 'requested_at' => now()->subDays(14), 'accepted_at' => now()->subDays(13), 'completed_at' => now()->subDays(7)]);
    }

    public function cancelled(): static
    {
        return $this->state(fn (array $attributes) => ['status' => 'cancelled', 'requested_at' => now()->subDays(4), 'accepted_at' => null, 'completed_at' => null]);
    }
}
