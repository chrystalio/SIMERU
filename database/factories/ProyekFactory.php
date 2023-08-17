<?php

namespace Database\Factories;

use App\Models\Karyawan;
use App\Models\Proyek;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProyekFactory extends Factory
{
    protected $model = Proyek::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'category' => $this->faker->randomElement(['PEMERINTAH', 'SWASTA', 'LAINNYA']),
            'karyawan_uuid' => app()->environment('testing') ? Karyawan::factory() : Karyawan::inRandomOrder()->first()->uuid,
            'status' => $this->faker->randomElement(['NOT STARTED', 'PENDING', 'CANCELLED', 'ON PROGRESS', 'FINISHED']),
            'created_at' => $this->faker->dateTime(),
        ];
    }
}
