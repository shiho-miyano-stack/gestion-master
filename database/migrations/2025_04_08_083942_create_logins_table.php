<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    { Schema::create('login', function (Blueprint $table) {
        $table->id();  
        $table->string('Log'); 
        $table->string('Pass');  
        $table->timestamps(); 
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('login');
    }
};
