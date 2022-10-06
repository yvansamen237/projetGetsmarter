<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("permissions")->insert([
            ["nom" => "ajouter un etudiant"],
            ["nom" => "consulter un etudiant"],
            ["nom" => "editer un etudiant"],

            ["nom" => "ajouter une formation"],
            ["nom" => "consulter une formation"],
            ["nom" => "editer une formation"],

            ["nom" => "ajouter une specialite"],
            ["nom" => "consulter une specialite"],
            ["nom" => "editer une specialite"]
        ]);
    }
}