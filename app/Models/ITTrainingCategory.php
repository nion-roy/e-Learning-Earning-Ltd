<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ITTrainingCategory extends Model
{
  use HasFactory;
  protected $guarded = [];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public static function createItTrainingCategory($requestData)
  {
    $itTrainingCategory = new ItTrainingCategory();
    $itTrainingCategory->user_id = Auth::id();
    $itTrainingCategory->category_name = $requestData['category_name'];

    if (isset($requestData['status'])) {
      $itTrainingCategory->status = $requestData['status'];
    } else {
      $itTrainingCategory->status = false;
    }

    $itTrainingCategory->save();
    return $itTrainingCategory;
  }


  public static function updateItTrainingCategory($id, $requestData)
  {
    $itTrainingCategory = ItTrainingCategory::findOrFail($id);
    $itTrainingCategory->category_name = $requestData['category_name'];
    $itTrainingCategory->status = $requestData['status'];
    $itTrainingCategory->update();
    return $itTrainingCategory;
  }


  public static function destroyItTrainingCategory($id)
  {
    $itTrainingCategory = ItTrainingCategory::findOrFail($id);
    $itTrainingCategory->delete();
    return $itTrainingCategory;
  }
}
