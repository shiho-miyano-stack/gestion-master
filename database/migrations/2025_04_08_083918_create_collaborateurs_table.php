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
        Schema::create('collaborateur', function (Blueprint $table) {
            $table->id();
            $table->string('NomFr');  // Crée une colonne "NomFr" de type chaîne de caractères (VARCHAR)
            $table->string('NomAr');  // Crée une colonne "NomAr" de type chaîne de caractères (VARCHAR)
            $table->string('CIN')->unique();  // Crée une colonne "CIN" avec contrainte d'unicité
            $table->string('Telephonne');  // Crée une colonne "Telephonne" de type chaîne de caractères (VARCHAR)
            $table->string('Email')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collaborateur');
    }
};
