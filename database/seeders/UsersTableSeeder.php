<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('users')->insert([
      [
        'name' => 'Admin',
        'slug' => 'admin',
        'username' => 'admin',
        'email' => 'admin@gmail.com',
        'role' => 'user',
        'status' => 1,
        'password' => Hash::make('12345678'),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ],
      [
        'name' => 'Co Admin',
        'slug' => 'co-admin',
        'username' => 'co admin',
        'email' => 'coadmin@gmail.com',
        'role' => 'user',
        'status' => 2,
        'password' => Hash::make('12345678'),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ], [
        'name' => 'Staff',
        'slug' => 'staff',
        'username' => 'staff',
        'email' => 'staff@gmail.com',
        'role' => 'user',
        'status' => 3,
        'password' => Hash::make('12345678'),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ], [
        'name' => 'User',
        'slug' => 'user',
        'username' => 'user',
        'email' => 'user@gmail.com',
        'role' => 'user',
        'status' => 4,
        'password' => Hash::make('12345678'),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]
    ]);
  }
}
