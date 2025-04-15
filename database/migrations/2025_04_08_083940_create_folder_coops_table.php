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
        Schema::create('folder_coop', function (Blueprint $table) {
            $table->id();  // Crée une colonne "id" en tant que clé primaire auto-incrémentée
            $table->string('Nom');  // Nom du dossier
            $table->double('Size', 8, 2)->nullable();  // Taille du fichier, avec précision
            $table->unsignedBigInteger('IdCoop');  // Référence à la table des coopératives
            $table->string('Observation')->nullable();  // Observation, colonne optionnelle

            // Ajoute la clé étrangère pour IdCoop qui fait référence à la table des coopératives
            $table->foreign('IdCoop')->references('id')->on('cooperative')->onDelete('cascade');

            // Ajoute les colonnes "created_at" et "updated_at"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('folder_coop');
    }
};
