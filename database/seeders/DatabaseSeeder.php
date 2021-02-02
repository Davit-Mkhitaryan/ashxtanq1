<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


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

         DB::table('users')->insert([
            'login' => 'Abraham',
            'password' => Hash::make('Abrahamyan'),
            'birthday' => '1995/05/23',
            'points' => 200
        ]);

          DB::table('users')->insert([
            'login' => 'Aram',
            'password' => Hash::make('Aramyan'),
            'birthday' => '1995/05/23',
            'points' => 100
        ]);


           DB::table('users')->insert([
            'login' => 'Anna',
            'password' => Hash::make('Aghabekyan'),
            'birthday' => '1995/05/23',
            'points' => 300
        ]);



            DB::table('users')->insert([
            'login' => 'Lilit',
            'password' => Hash::make('Kirakosyan'),
            'birthday' => '1995/05/23',
            'points' => 150
        ]);



             DB::table('users')->insert([
            'login' => 'Hayk',
            'password' => Hash::make('Hovsepyan'),
            'birthday' => '1995/05/23',
            'points' => 500
        ]);



              DB::table('users')->insert([
            'login' => 'Artash',
            'password' => Hash::make('Kirakosyan'),
            'birthday' => '1995/05/23',
            'points' => 200
        ]);



               DB::table('users')->insert([
            'login' => 'Karen',
            'password' => Hash::make('Martirosyan'),
            'birthday' => '1995/05/23'
        ]);






    }
}
