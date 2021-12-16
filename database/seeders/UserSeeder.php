<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user =  User::create([
            'email' => 'admin@admin.com',
            'name' => 'SUPER ADMIN',
            'firstName' => 'SUPER ADMIN',
            'lastName' => 'SUPER ADMIN',
            'adress' => 'Adresse',
            'phone' => '0812380589',
            'genre' => 'Masculin',
            'password' => Hash::make('password')
        ]);
        $user->givePermissionTo('SUPER ADMIN');
    }
}
