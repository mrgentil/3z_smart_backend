<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('modules')->insert([
            ['name' => 'Notification'],
            ['name' => 'Nos Analyses'],
            ['name' => 'Tableau de bord'],
            ['name' => 'Admin. Système'],

        ]);
    }
}
