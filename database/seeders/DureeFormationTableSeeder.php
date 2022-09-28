<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DureeFormationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("duree_formations")->insert([
            ["libelle" => "Journée", "volumeHoraire" => 24],
            ["libelle" => "Demi-journée", "volumeHoraire" => 12]
        ]);
    }
}