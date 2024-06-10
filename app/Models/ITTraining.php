<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ITTraining extends Model
{
  use HasFactory;
  protected $guarded = [];

  public function category()
  {
      return $this->belongsTo(ITTrainingCategory::class);
  }

  public static function createItTraining($requestData)
  {
    $itTraining = new ItTraining();
    $itTraining->user_id = Auth::id();
    $itTraining->category_id = $requestData['category_id'];
    $itTraining->name = $requestData['name'];
    $itTraining->slug = Str::slug($requestData['name']);
    $itTraining->details = $requestData['details'];

    if (isset($requestData['status'])) {
      $itTraining->status = $requestData['status'];
    } else {
      $itTraining->status = false;
    }

    $itTraining->image = self::itTrainingImage($requestData) ?? 'it_training.png';

    $itTraining->save();
    return $itTraining;
  }


  public static function updateItTraining($id, $requestData)
  {
    $itTraining = ItTraining::findOrFail($id);
    $itTraining->category_id = $requestData['category_id'];
    $itTraining->name = $requestData['name'];
    $itTraining->slug = Str::slug($requestData['name']);
    $itTraining->details = $requestData['details'];
    $itTraining->status = $requestData['status'];

    if (isset($requestData['image'])) {
      // Unlink old image
      if ($itTraining->image && file_exists(public_path('storage/training/') . $itTraining->image)) {
        unlink(public_path('storage/training/') . $itTraining->image);
      }
      $itTraining->image = self::itTrainingImage($requestData);
    }

    $itTraining->update();
    return $itTraining;
  }


  public static function destroyItTraining($id)
  {
    $itTraining = ItTraining::findOrFail($id);

    // Unlink image when delete itTraining
    if ($itTraining->image && file_exists(public_path('storage/training/') . $itTraining->image)) {
      unlink(public_path('storage/training/') . $itTraining->image);
    }

    $itTraining->delete();
    return $itTraining;
  }


  public static function itTrainingImage($requestData, $itTraining = null)
  {
    if (isset($requestData['image'])) {
      $image = $requestData['image'];
      $imageName = uniqid() . '.' . $image->getClientOriginalExtension();

      // Save original image
      $image->move(public_path('storage/training'), $imageName);

      // create new manager instance with desired driver
      $imgManager = new ImageManager(new Driver());
      $imagePath = $imgManager->read(public_path('storage/training/') . $imageName);

      // Resize image
      $imagePath->resize(300, 200);
      $imagePath->save();

      return $imageName;
    }
  }
}
