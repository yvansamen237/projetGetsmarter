<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FiliereTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('filieres')->insert([
            ['nom' => 'developpement'],
            ['nom' => 'vente'],
            ['nom' => 'communication'],
            ['nom' => 'mecanique'],
            ['nom' => 'graphisme'],
        ]);
    }
}
