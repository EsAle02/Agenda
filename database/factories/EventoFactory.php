<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contacto;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evento>
 */
class EventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Titulo' => $this->faker->sentence(),
            'Descripcion' => $this->faker->paragraph(),
            'Fecha_inicio' => $this->faker->dateTimeBetween('now', '+1 month'),
            'Fecha_fin' => $this->faker->dateTimeBetween('+1 month', '+2 months'),
            'Contacto_id' => Contacto::inRandomOrder()->first()->id,
            //
        ];
    }
}
