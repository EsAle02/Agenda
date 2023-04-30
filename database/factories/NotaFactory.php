<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contacto;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nota>
 */
class NotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'Texto'=>$this->faker->text,
            'Fecha'=>$this->faker->dateTime,
            'Contacto_id' => Contacto::inRandomOrder()->first()->id,
        ];
    }
}
