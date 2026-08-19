<?php

namespace Database\Factories;

use App\Models\Session;
use App\Models\Connection;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Session>
 */
class SessionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'connection_id' => Connection::factory()->connected(),
            'scheduled_at' => now()->addDays(3),
            'duration_minutes' => 60,
            'location' => 'Balai Warga RW 05',
            'status' => 'scheduled',
            'notes' => null,
            'completed_at' => null,
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Session $session): void {
            if ($session->status === 'completed') {
                $session->connection->update([
                    'status' => 'completed',
                    'completed_at' => $session->completed_at,
                ]);

                $session->connection->need->update(['status' => 'completed']);
            }
        });
    }

    public function scheduled(): static
    {
        return $this->state(fn (array $attributes) => ['scheduled_at' => now()->addDays(3), 'status' => 'scheduled', 'completed_at' => null]);
    }

    public function completed(): static
    {
        return $this->state(fn (array $attributes) => [
            'scheduled_at' => now()->subDays(7),
            'duration_minutes' => 90,
            'status' => 'completed',
            'notes' => 'Sesi berjalan lancar dan peserta dapat mempraktikkan materinya.',
            'completed_at' => now()->subDays(7)->addMinutes(90),
        ]);
    }

    public function cancelled(): static
    {
        return $this->state(fn (array $attributes) => ['scheduled_at' => now()->addDay(), 'status' => 'cancelled', 'completed_at' => null]);
    }
}
