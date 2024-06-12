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
    Schema::create('testimonials', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->constrained('users');
      $table->string('student_name');
      $table->string('address');
      $table->text('comment');
      $table->string('image')->default('student.png');
      $table->boolean('status')->default(false);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('testimonials');
  }
};
