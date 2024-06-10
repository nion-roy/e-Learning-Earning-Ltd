<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseCategory extends Model
{
  use HasFactory;

  protected $guarded = [];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public static function createCourseCategory($requestData)
  {
    $courseCategory = new CourseCategory();
    $courseCategory->user_id = Auth::id();
    $courseCategory->category_name = $requestData['category_name'];

    if (isset($requestData['status'])) {
      $courseCategory->status = $requestData['status'];
    } else {
      $courseCategory->status = false;
    }

    $courseCategory->save();
    return $courseCategory;
  }


  public static function updateCourseCategory($id, $requestData)
  {
    $courseCategory = CourseCategory::findOrFail($id);
    $courseCategory->category_name = $requestData['category_name'];
    $courseCategory->status = $requestData['status'];
    $courseCategory->update();
    return $courseCategory;
  }


  public static function destroyCourseCategory($id)
  {
    $courseCategory = CourseCategory::findOrFail($id);
    $courseCategory->delete();
    return $courseCategory;
  }
}
