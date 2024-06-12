<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HeaderSlider extends Model
{
  use HasFactory;
  protected $guarded = [];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public static function createHeaderSlider($requestData)
  {
    $headerSlider = new HeaderSlider();
    $headerSlider->user_id = Auth::id();
    $headerSlider->title = $requestData['title'];
    $headerSlider->image = self::headerSliderImage($requestData) ?? 'header_slider.png';
    $headerSlider->status = $requestData['status'];
    $headerSlider->save();
    return $headerSlider;
  }


  public static function updateHeaderSlider($id, $requestData)
  {
    $headerSlider = HeaderSlider::findOrFail($id);
    $headerSlider->title = $requestData['title'];
    $headerSlider->status = $requestData['status'];
    $headerSlider->image = self::headerSliderImage($requestData, $headerSlider);

    $headerSlider->update();
    return $headerSlider;
  }


  public static function destroyHeaderSlider($id)
  {
    $headerSlider = HeaderSlider::findOrFail($id);

    // Unlink image when delete headerSlider
    if ($headerSlider->image && file_exists(public_path('storage/header_sliders/') . $headerSlider->image)) {
      unlink(public_path('storage/header_sliders/') . $headerSlider->image);
    }

    $headerSlider->delete();
    return $headerSlider;
  }


  public static function headerSliderImage($requestData, $headerSlider = null)
  {
    if (isset($requestData['image'])) {
      $image = $requestData['image'];
      $imageName = uniqid() . '.' . $image->getClientOriginalExtension();

      // Unlink image when delete headerSlider
      if ($headerSlider && $headerSlider->image && file_exists(public_path('storage/header_sliders/') . $headerSlider->image)) {
        unlink(public_path('storage/header_sliders/') . $headerSlider->image);
      }

      // Save original image
      $image->move(public_path('storage/header_sliders'), $imageName);

      // create new manager instance with desired driver
      $imgManager = new ImageManager(new Driver());
      $imagePath = $imgManager->read(public_path('storage/header_sliders/') . $imageName);

      // Resize image
      $imagePath->resize(1920, 1080);
      $imagePath->save();

      return $imageName;
    } elseif ($headerSlider && $headerSlider->image) {
      return $headerSlider->image;
    }

    return null;
  }
}
