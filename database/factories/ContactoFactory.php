<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contacto>
 */
class ContactoFactory extends Factory
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
            'Nombre'=>$this->faker->firstName,
            'Apellido'=>$this->faker->lastName,
            'Correo_Electronico'=>$this->faker->safeEmail,
            'Telefono'=>$this->faker->phoneNumber,
        ];
    }
}
