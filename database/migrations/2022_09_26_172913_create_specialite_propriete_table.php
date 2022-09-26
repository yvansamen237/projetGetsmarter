 <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateSpecialiteProprieteTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('specialite_propriete', function (Blueprint $table) {
                $table->foreignId('specialite_id');
                $table->foreignId('propriete_specialite_id');
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
            Schema::table('specialite_propriete', function (Blueprint $table) {
                $table->dropForeign(['specialite_id', 'propriete_specialite_id']);
            });
            Schema::dropIfExists('specialite_propriete');
        }
    }
