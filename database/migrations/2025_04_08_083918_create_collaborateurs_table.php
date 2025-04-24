// database/migrations/xxxx_xx_xx_create_collaborateurs_table.php

<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollaborateursTable extends Migration
{
    public function up()
    {
        Schema::create('collaborateur', function (Blueprint $table) {
            $table->id();
            $table->string('NomFr')->nullable();
            $table->string('NomAr')->nullable();
            $table->string('CIN')->nullable();
            $table->string('Telephonne')->nullable();
            $table->string('Email')->nullable();
            $table->string('Poste')->nullable();
            $table->date('Date_naissance')->nullable();
            $table->string('Sexe')->nullable();
            $table->string('Situation_familiale')->nullable();
            $table->string('Niveau_etude')->nullable();
            $table->string('Couverture_sanitaire')->nullable();
            $table->string('Num_affiliation')->nullable();
            $table->string('Metier')->nullable();
            $table->text('Competences')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('collaborateur');
    }
};