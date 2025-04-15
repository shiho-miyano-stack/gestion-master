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
        Schema::create('secteur', function (Blueprint $table) {
            $table->id();  // Crée une colonne "id" en tant que clé primaire auto-incrémentée
            $table->string('Libelle');  // Crée la colonne "Libelle" pour stocker le nom du secteur
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('secteur');
    }
};
