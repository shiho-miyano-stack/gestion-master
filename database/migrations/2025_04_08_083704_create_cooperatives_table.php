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
        Schema::create('cooperative', function (Blueprint $table) {
            $table->id();
            $table->string('NumCop');
            $table->string('NomFr');
            $table->string('NomAr');
            $table->string('Num_Ordre');
            $table->date('Date_Enre');
            $table->string('Telephonne');
            $table->string('NumInscrip');
            $table->date('DateCreation');
            $table->string('NumAnalytique');
            $table->integer('NbrMem')->default(0);
            $table->boolean('DejaBeneficie');
            $table->integer('Nbr_Benifiement');
            $table->string('Adresse');
            $table->text('Informations')->nullable();
             $table->timestamps();
        });
        $table->foreignId('Collaborateur')->constrained('collaborateurs')->onDelete('cascade');
        $table->foreignId('Secteur')->constrained('secteurs')->onDelete('cascade');
        $table->foreignId('Categorie')->constrained('categories')->onDelete('cascade');
        $table->foreignId('IdCommune')->constrained('communes')->onDelete('cascade');
        $table->foreignId('Province')->constrained('provinces')->onDelete('cascade');
        $table->foreignId('Membre')->constrained('membres')->onDelete('cascade');
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cooperative');
    }
};
