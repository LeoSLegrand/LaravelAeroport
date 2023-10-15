<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Aeroports>
 */
class AeroportsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom_aeroport' => fake()->firstName(15),
            'ville_aeroport' => fake()->city(15),
            'code' => fake()->randomNumber(5),
            'nombre_piste' => fake()->randomNumber(2),
        ];
    }
}
