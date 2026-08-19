<?php

namespace Database\Factories;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Skill>
 */
class SkillFactory extends Factory
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
            'name' => fake()->unique()->randomElement([
                'Digital Payment', 'Smartphone', 'Programming', 'Desain Poster',
                'Media Sosial', 'Kewirausahaan', 'Memasak', 'Menjahit',
                'Berkebun', 'Pertanian Organik', 'Budaya Lokal', 'Fasilitasi Komunitas',
                'Manajemen Acara', 'Daur Ulang', 'Fotografi', 'Public Speaking',
                'Literasi Digital', 'Pengelolaan Sampah', 'Bahasa Inggris', 'Pertolongan Pertama',
            ]),
        ];
    }
}
