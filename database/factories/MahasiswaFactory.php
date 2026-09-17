<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MahasiswaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nim' => $this->faker->unique()->numerify('c030325###'),
            'nama' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'jurusan' => 'Teknik Elektro',
            'prodi' => 'Teknik Informatika',
            'semester' => $this->faker->numberBetween(1, 8),
        ];
    }
}