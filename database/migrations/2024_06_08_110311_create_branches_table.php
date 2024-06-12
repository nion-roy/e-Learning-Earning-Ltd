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
    Schema::create('branches', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->constrained('users');
      $table->string('branch_name')->unique();
      $table->string('slug')->unique();
      $table->string('address')->nullable();
      $table->string('contact_1')->nullable();
      $table->string('contact_2')->nullable();
      $table->string('email_1')->nullable();
      $table->string('email_2')->nullable();
      $table->boolean('status')->default(true);
      $table->string('image')->nullable()->default('branch.png');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('branches');
  }
};
