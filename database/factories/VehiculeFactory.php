<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Random\RandomException;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicule>
 */
class VehiculeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws RandomException
     */
    public function definition(): array
    {
        return [
            'matricule' => strtoupper($this->faker->unique()->word),
            'image_vehicule' => $this->faker->imageUrl(),
            'date_achat' => $this->faker->date,
            'km_defaut' => $this->faker->numberBetween(0, 10000),
            'km_actuel' => $this->faker->numberBetween(1000, 50000),
            'statut' => 'DISPONIBLE',
            'categorie' => $this->faker->randomElement(['CAMION', 'VOITURE', 'CITERNE', 'BUS']),
        ];
    }
}
