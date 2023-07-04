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
            'name' => $this->faker->company,
            'email' => $this->faker->companyEmail,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'proyek_id' => Proyek::factory()
        ];
    }
}
