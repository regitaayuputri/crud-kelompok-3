<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BarangFactory extends Factory
{
    public function definition(): array
    {
        return [
            'kode_barang' => 'LAB-' . fake()->unique()->numerify('####'),
            'nama_barang' => fake()->randomElement([
                'Mikroskop',
                'Gelas Ukur',
                'Tabung Reaksi',
                'Termometer',
                'Neraca Digital',
                'Buret',
                'Pipet Tetes',
                'Gelas Beaker',
                'Statif',
                'Penjepit Tabung',
            ]),
            'kategori' => fake()->randomElement([
                'Alat Ukur',
                'Alat Optik',
                'Alat Gelas',
                'Alat Keselamatan',
            ]),
            'lokasi' => fake()->randomElement([
                'Lemari A',
                'Lemari B',
                'Rak 1',
                'Rak 2',
                'Meja Laboratorium',
            ]),
            'jumlah' => fake()->numberBetween(1, 50),
            'kondisi' => fake()->randomElement([
                'Baik',
                'Perlu Perbaikan',
                'Rusak',
            ]),
            'keterangan' => fake()->optional()->sentence(),
        ];
    }
}
