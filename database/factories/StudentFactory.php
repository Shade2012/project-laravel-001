<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nis_siswa' => fake()->unique()->randomNumber(3, true),
            'nama_siswa' => fake()->name(),
            'kelas_id' => fake()->numberBetween(1, 4),
            'tanggal_lahir' => fake()->date(), 
            'alamat_siswa' => fake()->address(),
        ];
    }
}
