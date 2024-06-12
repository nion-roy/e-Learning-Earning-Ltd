<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Popup extends Model
{
  use HasFactory;

  protected $guarded = [];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public static function createPopup($requestData)
  {
    $popup = new Popup();
    $popup->user_id = Auth::id();
    $popup->title = $requestData['title'];
    $popup->url = $requestData['url'];
    $popup->image = self::popupImage($requestData) ?? 'popup.png';
    $popup->status = $requestData['status'];
    $popup->save();
    return $popup;
  }


  public static function updatePopup($id, $requestData)
  {
    $popup = Popup::findOrFail($id);
    $popup->title = $requestData['title'];
    $popup->url = $requestData['url'];
    $popup->status = $requestData['status'];
    $popup->image = self::popupImage($requestData, $popup);

    $popup->update();
    return $popup;
  }


  public static function destroyPopup($id)
  {
    $popup = Popup::findOrFail($id);

    // Unlink image when delete popup
    if ($popup->image && file_exists(public_path('storage/popup_banners/') . $popup->image)) {
      unlink(public_path('storage/popup_banners/') . $popup->image);
    }

    $popup->delete();
    return $popup;
  }


  public static function popupImage($requestData, $popup = null)
  {
    if (isset($requestData['image'])) {
      $image = $requestData['image'];
      $imageName = uniqid() . '.' . $image->getClientOriginalExtension();

      // Unlink image when delete popup
      if ($popup && $popup->image && file_exists(public_path('storage/popup_banners/') . $popup->image)) {
        unlink(public_path('storage/popup_banners/') . $popup->image);
      }

      // Save original image
      $image->move(public_path('storage/popup_banners'), $imageName);

      // create new manager instance with desired driver
      $imgManager = new ImageManager(new Driver());
      $imagePath = $imgManager->read(public_path('storage/popup_banners/') . $imageName);

      // Resize image
      $imagePath->resize(1224, 824);
      $imagePath->save();

      return $imageName;
    } elseif ($popup && $popup->image) {
      return $popup->image;
    }

    return null;
  }
}
