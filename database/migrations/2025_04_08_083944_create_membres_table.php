
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembresTable extends Migration
{
    public function up()
    {
        Schema::create('membre', function (Blueprint $table) {
            $table->id('Id');
            $table->string('NomFr', 500);
            $table->string('NomAr', 500);
            $table->string('CNI', 500);
            $table->string('Telephonne', 500);
            $table->string('Email', 500);
            $table->string('Poste', 500);
            $table->unsignedBigInteger('id_coop')->nullable();
            $table->timestamps();

            $table->foreign('id_coop')->references('Id')->on('cooperative')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('membre');
    }
}
