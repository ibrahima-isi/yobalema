<?php

use App\Models\Vehicule;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chauffeur_details', function (Blueprint $table) {
            $table->id();
            $table->string("num_permis")->unique();
            $table->enum('categorie', ['A1', 'A', 'B', 'C', 'D', 'E', 'F']);
            $table->date('date_delivrance');
            $table->date('date_expiration');
            $table->integer('annee_experience');
            $table->boolean('is_permis_valide');
            $table->string('image');
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
        Schema::dropIfExists('chauffeur_details');
    }
};
