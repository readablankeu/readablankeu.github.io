<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
        'name' => 'the admin user',
        'email' => 'iamadmin@gmail.com',
        'role' => 'admin',
        'password' => Hash::make('pass1'),
    ]);
        DB::table('users')->insert([
        'name' => 'the buyer user',
        'email' => 'iambuyer@gmail.com',
        'role' => 'user',
        'password' => Hash::make('pass1'),
  ]);
        }
    }