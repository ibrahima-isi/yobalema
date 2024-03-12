<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => fake()->name(),
            'prenom' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'telephone' => fake()->unique()->phoneNumber(),
            'adresse' => fake()->address(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Indicate that the model should have a random role.
     */
    public function withRandomRole(): static
    {
        // Obtenez un ID de rôle aléatoire
        $roleId = \App\Models\RoleUser::inRandomOrder()->value('id');

        return $this->state(fn (array $attributes) => [
            'role_user_id' => $roleId,
        ]);
    }


}
