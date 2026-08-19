<?php

namespace Database\Factories;

use App\Models\ImpactLog;
use App\Models\Participation;
use App\Models\Session;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ImpactLog>
 */
class ImpactLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reference_id' => Session::factory()->completed(),
            'user_id' => fn (array $attributes): int => Session::findOrFail($attributes['reference_id'])->connection->mentor_id,
            'type' => 'mentoring_hours',
            'value' => fn (array $attributes): float => Session::findOrFail($attributes['reference_id'])->duration_minutes / 60,
            'description' => 'Mengajarkan keterampilan kepada warga.',
            'reference_type' => 'session',
        ];
    }

    public function forSession(Session $session): static
    {
        return $this->state(fn (array $attributes) => [
            'user_id' => $session->connection->mentor_id,
            'type' => 'mentoring_hours',
            'value' => $session->duration_minutes / 60,
            'description' => 'Menyelesaikan sesi mentoring.',
            'reference_type' => 'session',
            'reference_id' => $session->id,
        ]);
    }

    public function forParticipation(Participation $participation): static
    {
        return $this->state(fn (array $attributes) => [
            'user_id' => $participation->user_id,
            'type' => 'event_participation',
            'value' => 1.00,
            'description' => 'Mengikuti kegiatan komunitas.',
            'reference_type' => 'participation',
            'reference_id' => $participation->id,
        ]);
    }
}
