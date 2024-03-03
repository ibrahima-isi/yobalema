<?php

namespace Database\Factories;

use App\Models\Vehicule;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chauffeur>
 */
class ChauffeurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'num_permis' => Str::random(10),
            'date_delivrance' => fake()->date(),
            'date_expiration' => fake()->date(),
            'annee_experience' => fake()->numberBetween(0, 20),
            'is_permis_valide' => fake()->boolean(),
            'image' => fake()->imageUrl(),
        ];
    }

    /**
     *  Indicate that the model should have a random vehicule
     */
    public function withRandomVehicule(): static
    {
        $vehiculeId  = Vehicule::inRandomOrder()->value('id');

        return $this->state(fn (array $attributes): array => ['vehicule_id' => $vehiculeId]);
    }
}
