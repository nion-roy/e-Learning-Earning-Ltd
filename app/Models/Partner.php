<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Partner extends Model
{
  use HasFactory;

  protected $guarded = [];


  public function category()
  {
    return $this->belongsTo(PartnerCategory::class);
  }


  public static function createPartner($requestData)
  {
    $partner = new Partner();
    $partner->user_id = Auth::id();
    $partner->category_id = $requestData['category_id'];
    $partner->partner_name = $requestData['partner_name'];
    $partner->slug = Str::slug($requestData['partner_name']);
    $partner->details = $requestData['details'];
    $partner->image = self::partnerImage($requestData);

    if (isset($requestData['status'])) {
      $partner->status = $requestData['status'];
    } else {
      $partner->status = false;
    }

    $partner->save();
    return $partner;
  }


  public static function updatePartner($id, $requestData)
  {
    $partner = Partner::findOrFail($id);
    $partner->category_id = $requestData['category_id'];
    $partner->partner_name = $requestData['partner_name'];
    $partner->slug = Str::slug($requestData['partner_name']);
    $partner->details = $requestData['details'];
    $partner->status = $requestData['status'];

    if (isset($requestData['image'])) {
      // Unlink old image
      if ($partner->image && file_exists(public_path('storage/partners/') . $partner->image)) {
        unlink(public_path('storage/partners/') . $partner->image);
      }
      $partner->image = self::partnerImage($requestData);
    }

    $partner->update();
    return $partner;
  }


  public static function destroyPartner($id)
  {
    $partner = Partner::findOrFail($id);

    // Unlink image when delete partner
    if ($partner->image && file_exists(public_path('storage/partners/') . $partner->image)) {
      unlink(public_path('storage/partners/') . $partner->image);
    }

    $partner->delete();
    return $partner;
  }


  public static function partnerImage($requestData, $partner = null)
  {
    if (isset($requestData['image'])) {
      $image = $requestData['image'];
      $imageName = uniqid() . '.' . $image->getClientOriginalExtension();

      // Save original image
      $image->move(public_path('storage/partners'), $imageName);

      // create new manager instance with desired driver
      $imgManager = new ImageManager(new Driver());
      $imagePath = $imgManager->read(public_path('storage/partners/') . $imageName);

      // Resize image
      $imagePath->resize(170, 80);
      $imagePath->save();

      return $imageName;
    }
  }
}
