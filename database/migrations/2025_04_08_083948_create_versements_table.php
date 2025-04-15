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
        Schema::create('versement', function (Blueprint $table) {
            $table->id();  // Crée une colonne "id" en tant que clé primaire auto-incrémentée
            $table->date('DateVers');  // Crée la colonne "DateVers" pour la date du versement
            $table->float('Montant');  // Crée la colonne "Montant" pour stocker le montant du versement
            $table->unsignedBigInteger('IdSubv');  // Crée la colonne "IdSubv" pour la clé étrangère vers la table "subvention"
            
            // Définition de la clé étrangère
            $table->foreignId('IdSubv')->constrained('subvention')->onDelete('cascade');
            
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('versement');
    }
};
