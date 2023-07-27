<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Karyawan>
 */
class KaryawanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'role' => 'Staff', // add this line
            'department_id' => app()->environment('testing') ? Department::factory() : Department::inRandomOrder()->first()->id,
        ];
    }

    public function uuid(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'uuid' => Str::uuid(),
            ];
        });

    }
}
