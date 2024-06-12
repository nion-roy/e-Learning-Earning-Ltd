<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimonial extends Model
{
  use HasFactory;

  protected $guarded = [];

  public static function createTestimonial($requestData)
  {
    $testimonial = new Testimonial();
    $testimonial->user_id = Auth::id();
    $testimonial->student_name = $requestData['student_name'];
    $testimonial->address = $requestData['address'];
    $testimonial->comment = $requestData['comment'];
    $testimonial->image = self::testimonialImage($requestData) ?? 'student.png';
    $testimonial->status = $requestData['status'];
    $testimonial->save();
    return $testimonial;
  }


  public static function updateTestimonial($id, $requestData)
  {
    $testimonial = Testimonial::findOrFail($id);
    $testimonial->student_name = $requestData['student_name'];
    $testimonial->address = $requestData['address'];
    $testimonial->comment = $requestData['comment'];
    $testimonial->status = $requestData['status'];

    if (isset($requestData['image'])) {
      // Unlink old image
      if ($testimonial->image && file_exists(public_path('storage/testimonials/') . $testimonial->image)) {
        unlink(public_path('storage/testimonials/') . $testimonial->image);
      }
      $testimonial->image = self::testimonialImage($requestData);
    }

    $testimonial->update();
    return $testimonial;
  }


  public static function destroyTestimonial($id)
  {
    $testimonial = Testimonial::findOrFail($id);

    // Unlink image when delete testimonial
    if ($testimonial->image && file_exists(public_path('storage/testimonials/') . $testimonial->image)) {
      unlink(public_path('storage/testimonials/') . $testimonial->image);
    }

    $testimonial->delete();
    return $testimonial;
  }


  public static function testimonialImage($requestData, $testimonial = null)
  {
    if (isset($requestData['image'])) {
      $image = $requestData['image'];
      $imageName = uniqid() . '.' . $image->getClientOriginalExtension();

      // Save original image
      $image->move(public_path('storage/testimonials'), $imageName);

      // create new manager instance with desired driver
      $imgManager = new ImageManager(new Driver());
      $imagePath = $imgManager->read(public_path('storage/testimonials/') . $imageName);

      // Resize image
      $imagePath->resize(460, 460);
      $imagePath->save();

      return $imageName;
    }
  }
}
