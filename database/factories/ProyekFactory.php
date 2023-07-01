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
            'nama' => $this->faker->name,
            'deskripsi' => $this->faker->text,
            'tanggal_mulai' => $this->faker->date(),
            'tanggal_selesai' => $this->faker->date(),
            'kategori' => $this->faker->randomElement(['PEMERINTAH', 'SWASTA', 'LAINNYA']),
            'karyawan_id' => Karyawan::factory(),
            'status' => $this->faker->randomElement(['NOT STARTED', 'PENDING', 'CANCELLED', 'ON PROGRESS','FINISHED']),
            'created_at' => $this->faker->dateTime(),
        ];
    }
}
