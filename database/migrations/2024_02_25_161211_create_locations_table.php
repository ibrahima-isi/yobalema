<?php

use App\Models\Chauffeur;
use App\Models\User;
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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->dateTime('heure_depart')->default(now());
            $table->dateTime('heure_arrivee')->nullable();
            $table->date('date_location');
            $table->string('lieu_depart');
            $table->string('lieu_destination');
            $table->integer('prix_estime');
            $table->unsignedBigInteger('chauffeur_id') -> nullable();
            $table->unsignedBigInteger('client_id') -> nullable();

            $table->foreign('chauffeur_id')
                -> references('id')
                -> on('users')
                -> constrained()
                -> cascadeOnUpdate()
                -> cascadeOnDelete();

            $table->foreign('client_id')
                -> references('id')
                -> on('users')
                -> constrained()
                -> cascadeOnUpdate()
                -> cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
