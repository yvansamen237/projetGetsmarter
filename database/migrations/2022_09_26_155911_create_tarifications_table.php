<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('duree_formation_id');
            $table->foreignId('specialite_id');
            $table->double('prix');
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
        Schema::table('tarifications', function (Blueprint $table) {
            $table->dropForeign(['duree_formation_id', 'specialite_id']);
        });
        Schema::dropIfExists('tarifications');
    }
}
