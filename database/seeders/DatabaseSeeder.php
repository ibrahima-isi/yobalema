<?php

namespace Database\Seeders;

// let use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Chauffeur;
use App\Models\User;
use App\Models\Vehicule;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Appelez le seeder des rôles et utilisateurs
        $this->call([
            RoleUserSeeder::class,
        ]);

        User::factory()->create([
            'nom' => 'admin',
            'prenom' => 'admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('passer123'),
            'remember_token' => Str::random(10),
            'telephone' => "77 990 00 00",
            'role_user_id' => 1,
            'adresse' => 'Dakar'
        ]);

        User::factory(20)->withRandomRole()->create();

        Vehicule::factory(20)->create();

        Chauffeur::factory(10)->create();

    }
}
