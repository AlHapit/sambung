<?php

namespace Database\Factories;

use App\Models\Need;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Need>
 */
class NeedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => fake()->sentence(5),
            'description' => fake()->paragraph(2),
            'category' => fake()->randomElement(['Teknologi', 'Pendidikan', 'Lingkungan', 'Kesehatan', 'Usaha']),
            'status' => 'open',
        ];
    }

    public function open(): static
    {
        return $this->state(fn (array $attributes) => ['status' => 'open']);
    }

    public function matched(): static
    {
        return $this->state(fn (array $attributes) => ['status' => 'matched']);
    }

    public function completed(): static
    {
        return $this->state(fn (array $attributes) => ['status' => 'completed']);
    }

    public function cancelled(): static
    {
        return $this->state(fn (array $attributes) => ['status' => 'cancelled']);
    }
}
