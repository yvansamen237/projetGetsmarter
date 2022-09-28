<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('specialites')->insert([
            [
                'matricule' => 'wft34iu',
                'nom' => 'programmation',
                'imageUrl' => 'lien image',
                'estDisponible' => 1,
                'filiere_id' => 1,
            ],
            [
                'matricule' => 'wft3df4iu',
                'nom' => 'e-commerce',
                'imageUrl' => 'lien image',
                'estDisponible' => 1,
                'filiere_id' => 2,
            ],
            [
                'matricule' => 'ft34iu',
                'nom' => 'marketing digital',
                'imageUrl' => 'lien image',
                'estDisponible' => 1,
                'filiere_id' => 3,
            ],
            [
                'matricule' => 'wftev34iu',
                'nom' => 'deblocage mobile',
                'imageUrl' => 'lien image',
                'estDisponible' => 1,
                'filiere_id' => 4,
            ],
            [
                'matricule' => 'wfte34iu',
                'nom' => 'web design',
                'imageUrl' => 'lien image',
                'estDisponible' => 1,
                'filiere_id' => 5,
            ]
        ]);
    }
}