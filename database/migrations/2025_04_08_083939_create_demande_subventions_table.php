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
        Schema::create('demande_subvention', function (Blueprint $table) {
            $table->id();  // Crée une colonne "id" en tant que clé primaire auto-incrémentée
            $table->string('Satut')->nullable(false);;  // Statut de la demande
            $table->text('Observation')->nullable();  // Observation (peut être null)
            $table->unsignedBigInteger('IdCoop');  // Référence à la table des coopératives
            $table->unsignedBigInteger('IdSubv');  // Référence à la table des subventions
            $table->string('fichier')->nullable();

            // Ajoute des clés étrangères pour IdCoop et IdSubv
            $table->foreign('IdCoop')->references('id')->on('cooperatives')->onDelete('cascade');
            $table->foreign('IdSubv')->references('Id')->on('subvention')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_subvention');
    }
};
