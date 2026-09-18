<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MahasiswaFactory extends Factory
{
    public function definition(): array
    {
        $jurusan = [
            'Teknik Informatika',
            'Teknik Sipil',
            'Teknik Mesin',
            'Teknik Alat Berat',
            'teknik Pertambangan',
            'Teknik Elektronik',
            'Teknik Listrik',
            'teknik Nuklir',
        ];

        return [
            'nim' => $this->faker->unique()->numerify('c030325###'),
            'nama' => fake('id_ID')->name(),
            'no_telp' => '08' . $this->faker->unique()->numerify('##########'),
            'email' => $this->faker->unique()->safeEmail(),
            'prodi' => $this->faker->randomElement($jurusan),
            'semester' => $this->faker->numberBetween(1, 8),
        ];
    }
}