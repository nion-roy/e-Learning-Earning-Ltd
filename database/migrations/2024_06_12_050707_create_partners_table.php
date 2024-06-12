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
    Schema::create('partners', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->constrained('users');
      $table->foreignId('category_id')->constrained('partner_categories')->cascadeOnDelete();
      $table->string('partner_name')->unique();
      $table->string('slug')->unique();
      $table->text('details')->nullable();
      $table->string('image')->nullable()->default('partner.png');
      $table->boolean('status')->default(false);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('partners');
  }
};
