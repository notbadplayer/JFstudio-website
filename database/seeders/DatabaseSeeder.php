<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'email' => 'k.rogaczewski@hotmail.com',
            'name' => 'Kamil Rogaczewski',
            'password' => Hash::make('JFpass1234') // <---- check this
        ]);
    }
}
