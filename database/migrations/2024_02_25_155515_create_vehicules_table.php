<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->string("matricule")->unique();
            $table->date("date_achat");
            $table->integer("km_defaut");
            $table->integer("km_actuel");
            $table->enum('statut', ['DISPONIBLE', 'PANNE', "EN LOCATION"]);
            $table->enum("categorie", ['CAMION', 'VOITURE', 'CITERNE', 'BUS']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicules');
    }
};
