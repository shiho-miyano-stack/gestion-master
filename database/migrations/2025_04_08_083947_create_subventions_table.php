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
        Schema::create('subvention', function (Blueprint $table) {
            $table->id();  // Crée une colonne "id" en tant que clé primaire auto-incrémentée
            $table->string('Type_Sub');  // Crée la colonne "Type_Sub" pour stocker le type de la subvention
            $table->float('Montant')->nullable();  // Crée la colonne "Montant" pour stocker le montant de la subvention
            $table->date('DateTransfert')->nullable();  // Crée la colonne "DateTransfert" pour la date de transfert de la subvention
            $table->date('DateDepot')->nullable();  // Crée la colonne "DateDepot" pour la date de dépôt de la subvention
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subvention');
    }
};
