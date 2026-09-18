<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DosenFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nip' => $this->faker->unique()->numerify('##################'),
            'nama' => fake('id_ID')->name(),
            'no_telp' => '08' . $this->faker->unique()->numerify('##########'),
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}