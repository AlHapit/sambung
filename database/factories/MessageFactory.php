<?php

namespace Database\Factories;

use App\Models\Message;
use App\Models\Connection;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'room_type' => 'mentoring',
            'room_id' => Connection::factory()->connected(),
            'sender_id' => fn (array $attributes): int => Connection::findOrFail($attributes['room_id'])->mentor_id,
            'content' => 'Halo, apakah kita bisa melanjutkan diskusi besok?',
            'attachment' => null,
        ];
    }

    public function forMentoring(Connection $connection, User $sender): static
    {
        return $this->state(fn (array $attributes) => [
            'room_type' => 'mentoring',
            'room_id' => $connection->id,
            'sender_id' => $sender->id,
        ]);
    }

    public function forEvent(Event $event, User $sender): static
    {
        return $this->state(fn (array $attributes) => [
            'room_type' => 'event',
            'room_id' => $event->id,
            'sender_id' => $sender->id,
        ]);
    }
}
