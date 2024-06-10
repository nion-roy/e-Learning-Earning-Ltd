<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('settings')->insert([
      'web_name' => 'e-Learning & Earning Ltd.',
      'web_logo' => 'logo.png',
      'web_favicon' => 'favicon.png',
      'bd_address' => 'Khaja Super Market, 2nd to 7th Floor, Kallyanpur Bus Stop, Mirpur Road, Dhaka-1207.',
      'uk_address' => '3 PITSEA STREET E1 0JH London',
      'telephone' => json_encode(['+88 02-58054685', '+88 02-8091188']),
      'call_number' => json_encode(['+88 01550-666800']),
      'phone_number' => json_encode(['+88 01550-666900']),
      'email' => json_encode(['info@e-laeltd.com']),
      'social' => json_encode(['facebook.com', 'youtube.com', 'twitter.com']),
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ]);
  }
}
