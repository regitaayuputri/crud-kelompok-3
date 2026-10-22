<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BarangFactory extends Factory
{
    public function definition(): array
    {
        // Daftar nama barang lab agar diacak otomatis secara lokal
        $barangLab = [
            'Tabung Reaksi', 'Gelas Ukur 100ml', 'Erlenmeyer 250ml', 'Pipet Tetes',
            'Mikroskop Binokuler', 'Cawan Petri', 'Bunsen Burner', 'Kaki Tiga',
            'Kawat Kasa', 'Rak Tabung Reaksi', 'Labu Ukur 500ml', 'Corong Kaca',
            'Spatula Logam', 'Batang Pengaduk', 'Termometer Raksa', 'pH Meter Digital',
            'Buret 50ml', 'Statif dan Klem', 'Mortar dan Alu', 'Botol Semprot'
        ];

        $kategori = ['Kaca', 'Alat', 'Besi', 'Kayu', 'Alat Ukur', 'Plastik'];
        $lokasi = ['Lemari A', 'Lemari B', 'Lemari C', 'Meja Utama', 'Meja Praktikum'];
        $kondisi = ['Baik', 'Rusak Ringan'];

        return [
            'kode' => 'LAB' . $this->faker->unique()->numberBetween(100, 999),
            'nama_barang' => $this->faker->randomElement($barangLab),
            'kategori' => $this->faker->randomElement($kategori),
            'lokasi' => $this->faker->randomElement($lokasi),
            'jumlah' => $this->faker->numberBetween(1, 50), 
            'kondisi' => $this->faker->randomElement($kondisi),
            'keterangan' => 'Alat keperluan praktikum lab.',
        ];
    }
}
