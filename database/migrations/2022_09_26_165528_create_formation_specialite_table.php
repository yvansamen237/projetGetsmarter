<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormationSpecialiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formation_specialite', function (Blueprint $table) {
            $table->foreignId('formation_id');
            $table->foreignId('specialite_id');
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
        Schema::table('formation_specialite', function (Blueprint $table) {
            $table->dropForeign(['formation_id', 'specialite_id']);
        });
        Schema::dropIfExists('tarifications');
        Schema::dropIfExists('formation_specialite');
    }
}
