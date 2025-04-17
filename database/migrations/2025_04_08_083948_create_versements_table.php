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
            $table->id('Id');
            $table->date('DateVers')->nullable();
            $table->float('Montant')->nullable();
            $table->unsignedBigInteger('IdSubv');
            $table->date('periode_debut')->nullable();
            $table->date('periode_fin')->nullable();
            $table->string('mode_paiement', 100)->nullable();
            $table->string('reference_paiement', 100)->nullable();
            $table->text('observation')->nullable();
            $table->timestamps();

            $table->foreign('IdSubv')->references('Id')->on('subvention')->onDelete('cascade');
            
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
