<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserSoftware extends Model
{
  use HasFactory;
  protected $guarded = [];


  public static function createUserSoftware($requestData)
  {
    $userSoftware = new UserSoftware();
    $userSoftware->user_id = Auth::id();
    $userSoftware->software_name = $requestData['software_name'];
    $userSoftware->details = $requestData['details'];
    $userSoftware->slug = Str::slug($userSoftware->software_name);
    
    if (isset($requestData['status'])) {
      $userSoftware->status = $requestData['status'];
    } else {
      $userSoftware->status = false;
    }

    $userSoftware->image = self::userSoftwareImage($requestData) ?? 'user_software.png';
    $userSoftware->save();
    return $userSoftware;
  }


  public static function updateUserSoftware($id, $requestData)
  {
    $userSoftware = UserSoftware::findOrFail($id);
    $userSoftware->software_name = $requestData['software_name'];
    $userSoftware->details = $requestData['details'];
    $userSoftware->slug = Str::slug($userSoftware->software_name);
    $userSoftware->status = $requestData['status'];

    if (isset($requestData['image'])) {
      // Unlink old image
      if ($userSoftware->image && file_exists(public_path('storage/training/') . $userSoftware->image)) {
        unlink(public_path('storage/training/') . $userSoftware->image);
      }
      $userSoftware->image = self::userSoftwareImage($requestData);
    }


    $userSoftware->update();
    return $userSoftware;
  }


  public static function destroyUserSoftware($id)
  {
    $userSoftware = UserSoftware::findOrFail($id);

    // Unlink image when delete userSoftware
    if ($userSoftware->image && file_exists(public_path('storage/user_software/') . $userSoftware->image)) {
      unlink(public_path('storage/user_software/') . $userSoftware->image);
    }



    $userSoftware->delete();
    return $userSoftware;
  }


  public static function userSoftwareImage($requestData, $userSoftware = null)
  {
    if (isset($requestData['image'])) {
      $image = $requestData['image'];
      $imageName = uniqid() . '.' . $image->getClientOriginalExtension();

      // Save original image
      $image->move(public_path('storage/user_software'), $imageName);

      // create new manager instance with desired driver
      $imgManager = new ImageManager(new Driver());
      $imagePath = $imgManager->read(public_path('storage/user_software/') . $imageName);

      // Resize image
      $imagePath->resize(300, 200);
      $imagePath->save();

      return $imageName;
    }
  }
}
