<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('settings', function (Blueprint $table) {
      $table->id();
      $table->string('web_name')->default('e-Learning & Earning Ltd.');
      $table->string('web_logo')->default('logo.png');
      $table->string('web_favicon')->default('favicon.png');
      $table->string('bd_address')->nullable();
      $table->string('uk_address')->nullable();
      $table->json('telephone')->nullable();
      $table->json('call_number')->nullable();
      $table->json('phone_number')->nullable();
      $table->json('email')->nullable();
      $table->json('social')->nullable();
      $table->string('google_map')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('settings');
  }
};
