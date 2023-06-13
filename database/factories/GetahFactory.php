<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Getah>
 */
class GetahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tanggal' => $this->faker->date(),
            // uraian small text
            'uraian' => $this->faker->text(30),
            'nama_penyadap' => $this->faker->name(),
            'petak' => $this->faker->word(),
            'luas' => $this->faker->randomNumber(),
            'jml_pohon' => $this->faker->randomNumber(),
            'target' => $this->faker->randomNumber(),
            'realisasi' => $this->faker->randomNumber(),
            // foto dummy
            'foto_keterangan' => 'https://via.placeholder.com/640x480.png/00ff77?text=quia',
            'created_at' => now(),
        ];
    }
}
