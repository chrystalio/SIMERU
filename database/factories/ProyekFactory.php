<?php

namespace Database\Factories;

use App\Models\Proyek;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProyekFactory extends Factory
{
    protected $model = Proyek::class;

    public function definition(): array
    {
        return [
            'nama' => $this->faker->name,
            'deskripsi' => $this->faker->text,
            'tanggal_mulai' => $this->faker->date(),
            'tanggal_selesai' => $this->faker->date(),
            'karyawan_id' => $this->faker->numberBetween(1, 211)
        ];
    }
}
