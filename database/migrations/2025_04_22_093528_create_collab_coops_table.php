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
        Schema::create('collab_coop', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_coll')->constrained('collaborateurs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_coop')->constrained('cooperatives')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collab_coop');
    }
};
