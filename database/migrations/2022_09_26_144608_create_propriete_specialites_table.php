<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProprieteSpecialitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propriete_specialites', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->boolean('estObligatoire')->default(1);
            $table->foreignId('filiere_id')->constrained();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('propriete_specialites', function (Blueprint $table) {
            $table->dropForeign('filiere_id');
        });
        Schema::dropIfExists('propriete_specialites');
    }
}