<?php

namespace Database\Factories;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'kode_barang' => fake()->unique()->numerify('BRG-####'),
            'nama_barang' => fake()->words(2, true),
            'kategori' => fake()->randomElement(['Elektronik', 'ATK', 'Perabot']),
            'lokasi' => fake()->randomElement(['Gudang', 'Ruang Kelas', 'Kantor']),
            'jumlah' => fake()->numberBetween(1, 100),
            'kondisi' => fake()->randomElement(['Baik', 'Rusak']),
            'keterangan' => fake()->sentence(),
        ];
    }
}
