<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Aeroports;
use App\Models\Compagnies;
use Carbon\Carbon;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vols>
 */
class VolsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition(): array
    {

        $date = fake()->date;
        $time = fake()->time;

        return [
            'numero' => random_int(999,9999),
            'compagnies_id' => Compagnies::factory()->create(),
            'date_depart' => $date,
            'date_arivee' => $date,
            'heure_depart' =>  $time,
            'heure_arivee' =>  Carbon::parse($date.' '.$time)->addHour(),
            'nombre_place' => random_int(50,999),
            'aeroport_id_depart' => Aeroports::factory()->create(),
            'aeroport_id_arivee' => Aeroports::factory()->create(),
        ];
    }
}
