<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFolderSubvTable extends Migration
{
    public function up()
    {
        Schema::create('folder_subv', function (Blueprint $table) {
            $table->increments('Id');
            $table->string('Nom', 500)->nullable();
            $table->float('Size')->nullable();
            $table->unsignedInteger('IdSubv');
            $table->string('Observation', 1000)->nullable();

            // ✅ Clé étrangère vers la table `subvention`
            $table->foreign('IdSubv')->references('Id')->on('subvention')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('folder_subv');
    }
}
