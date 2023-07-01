<?php

namespace Database\Factories;

use App\Models\Proyek;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Klien>
 */
class KlienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->company,
            'email' => $this->faker->companyEmail,
            'alamat' => $this->faker->address,
            'no_telp' => $this->faker->phoneNumber,
            'proyek_id' => Proyek::factory()
        ];
    }
}
