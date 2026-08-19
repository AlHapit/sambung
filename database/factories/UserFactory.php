<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'age' => fake()->numberBetween(16, 75),
            'location' => fake()->randomElement([
                'Jakarta Selatan',
                'Bandung',
                'Depok',
                'Tangerang Selatan',
            ]),
            'latitude' => fake()->randomFloat(7, -6.35, -6.15),
            'longitude' => fake()->randomFloat(7, 106.70, 106.95),
            'role' => 'user',
            'simple_mode' => false,
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function organizer(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'organizer',
        ]);
    }

    public function admin(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'admin',
        ]);
    }
}
