<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('folder_subv', function (Blueprint $table) {
            $table->id();  
            $table->string('Nom'); 
            $table->float('Size')->nullable();  
            $table->unsignedBigInteger('IdSubv'); 
            $table->string('Observation')->nullable();  

            
            
            $table->foreignId('IdSubv')->constrained('subvention')->onDelete('cascade');

           
            $table->timestamps();

        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('folder_subv');
    }
};
