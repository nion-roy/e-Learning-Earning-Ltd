<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class Branch extends Model
{
  use HasFactory;

  protected $guarded = [];

  public static function createBranch($requestData)
  {
    $branch = new Branch();
    $branch->user_id = Auth::id();
    $branch->branch_name = $requestData['branch_name'];
    $branch->slug = Str::slug($requestData['branch_name']);
    $branch->address = $requestData['address'];
    $branch->email_1 = $requestData['email_1'];
    $branch->email_2 = $requestData['email_2'] ?? null;
    $branch->contact_1 = $requestData['contact_1'];
    $branch->contact_2 = $requestData['contact_2'] ?? null;
    
    if (isset($requestData['status'])) {
      $branch->status = $requestData['status'];
    } else {
      $branch->status = false;
    }

    $branch->image = self::branchImage($requestData);

    $branch->save();
    return $branch;
  }


  public static function updateBranch($id, $requestData)
  {
    $branch = Branch::findOrFail($id);
    $branch->branch_name = $requestData['branch_name'];
    $branch->slug = Str::slug($requestData['branch_name']);
    $branch->address = $requestData['address'];
    $branch->email_1 = $requestData['email_1'];
    $branch->email_2 = $requestData['email_2'] ?? null;
    $branch->contact_1 = $requestData['contact_1'];
    $branch->contact_2 = $requestData['contact_2'] ?? null;
    $branch->status = $requestData['status'];
    // $branch->image = self::branchImage($branch->image);

    if (isset($requestData['image'])) {
      // Unlink old image
      if ($branch->image && file_exists(public_path('storage/branches/') . $branch->image)) {
        unlink(public_path('storage/branches/') . $branch->image);
      }
      $branch->image = self::branchImage($requestData);
    }

    $branch->update();
    return $branch;
  }


  public static function destroyBranch($id)
  {
    $branch = Branch::findOrFail($id);

    // Unlink image when delete branch
    if ($branch->image && file_exists(public_path('storage/branches/') . $branch->image)) {
      unlink(public_path('storage/branches/') . $branch->image);
    }

    $branch->delete();
    return $branch;
  }


  public static function branchImage($requestData, $branch = null)
  {
    if (isset($requestData['image'])) {
      $image = $requestData['image'];
      $imageName = uniqid() . '.' . $image->getClientOriginalExtension();

      // Save original image
      $image->move(public_path('storage/branches'), $imageName);

      // create new manager instance with desired driver
      $imgManager = new ImageManager(new Driver());
      $imagePath = $imgManager->read(public_path('storage/branches/') . $imageName);

      // Resize image
      $imagePath->resize(300, 200);
      $imagePath->save();

      return $imageName;
    }
  }
}
