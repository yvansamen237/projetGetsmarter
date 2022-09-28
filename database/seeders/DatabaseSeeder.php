<?php

namespace Database\Seeders;

use App\Models\Etudiant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleTableSeeder;
use Database\Seeders\FiliereTableSeeder;
use Database\Seeders\PermissionTableSeeder;
use Database\Seeders\SpecialiteTableSeeder;
use Database\Seeders\DureeFormationTableSeeder;
use Database\Seeders\StatutFormationTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(FiliereTableSeeder::class);
        $this->call(SpecialiteTableSeeder::class);
        Etudiant::factory(10)->create();
        User::factory(5)->create();


        $this->call(RoleTableSeeder::class);
        $this->call(StatutFormationTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(DureeFormationTableSeeder::class);

        User::find(1)->roles()->attach(1);
        User::find(2)->roles()->attach(2);
        User::find(3)->roles()->attach(3);
        User::find(4)->roles()->attach(4);
    }
}