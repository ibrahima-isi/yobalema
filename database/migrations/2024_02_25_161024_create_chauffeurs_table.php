<?php

use App\Models\Vehicule;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Les categories :
     * A => motos
     * B => voiture
     * C => camion
     * D => Bus
     * E => Gros Camions
     * F => Vehicules speciaux
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('chauffeurs', function (Blueprint $table) {
            $table->id();
            $table->string("num_permis")->unique();
            $table->enum('categorie', ['A1', 'A', 'B', 'C', 'D', 'E', 'F']);
            $table->date('date_delivrance');
            $table->date('date_expiration');
            $table->integer('annee_experience');
            $table->boolean('is_permis_valide');
            $table->foreignIdFor(Vehicule::class)
                ->nullable()
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chauffeurs');
    }
};
