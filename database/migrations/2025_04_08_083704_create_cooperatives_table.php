// database/migrations/xxxx_xx_xx_create_cooperatives_table.php
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCooperativesTable extends Migration
{
    public function up()
    {
        Schema::create('cooperative', function (Blueprint $table) {
            $table->id();

            $table->integer('NumCop')->nullable();
            $table->string('NomFr', 500)->nullable();
            $table->string('NomAr', 500)->nullable();
            $table->integer('Num_Ordre')->nullable();
            $table->date('Date_Enre')->nullable();
            $table->string('Telephonne', 50)->nullable();
            $table->string('NumInscrip', 500)->nullable();
            $table->date('DateCreation')->nullable();
            $table->string('NumAnalytique', 500)->nullable();
            $table->integer('NbrMem');
            $table->integer('NbrColl')->nullable();
            $table->unsignedBigInteger('Secteur')->nullable();    // foreign key
            $table->unsignedBigInteger('Categorie')->nullable();  // foreign key
            $table->string('Adresse', 500)->nullable();
            $table->string('Informations', 1000)->nullable();
            $table->unsignedBigInteger('IdComm');                // foreign key obligatoire
            $table->string('DejaBeneficie', 5)->nullable();
            $table->integer('Nbr_Benifiement')->nullable();
            $table->timestamps();

            // Clés étrangères
            $table->foreign('IdComm')->references('Id')->on('commune')->onDelete('cascade');
            $table->foreign('Secteur')->references('Id')->on('secteur')->onDelete('set null');
            $table->foreign('Categorie')->references('Id')->on('categorie')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cooperatives');
    }
}
