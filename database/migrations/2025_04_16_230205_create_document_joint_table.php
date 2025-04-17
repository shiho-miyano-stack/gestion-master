<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('document_joint', function (Blueprint $table) {
            $table->id(); // équivalent à `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT
            $table->unsignedBigInteger('demande_id')->nullable();
            $table->string('nom_fichier', 255)->nullable();
            $table->string('type_fichier', 100)->nullable();
            $table->text('chemin_fichier')->nullable();
            $table->date('date_ajout')->nullable();
            $table->timestamps();
    
            // Clé étrangère (optionnelle mais recommandée)
            $table->foreign('demande_id')->references('Id')->on('demande_subvention')->onDelete('cascade');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_joint');
    }
};
