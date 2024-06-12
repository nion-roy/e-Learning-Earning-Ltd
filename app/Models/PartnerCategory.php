<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PartnerCategory extends Model
{
  use HasFactory;

  protected $guarded = [];

  public function user()
  {
    return $this->belongsTo(User::class);
  }


  public static function createPartnerCategory($requestData)
  {
    $partnerCategory = new PartnerCategory();
    $partnerCategory->user_id = Auth::id();
    $partnerCategory->category_name = $requestData['category_name'];
    $partnerCategory->slug = Str::slug($partnerCategory->category_name);
    $partnerCategory->status = $requestData['status'];
    $partnerCategory->save();
    return $partnerCategory;
  }


  public static function updatePartnerCategory($id, $requestData)
  {
    $partnerCategory = PartnerCategory::findOrFail($id);
    $partnerCategory->category_name = $requestData['category_name'];
    $partnerCategory->slug = Str::slug($partnerCategory->category_name);
    $partnerCategory->status = $requestData['status'];
    $partnerCategory->update();
    return $partnerCategory;
  }


  public static function destroyPartnerCategory($id)
  {
    $partnerCategory = PartnerCategory::findOrFail($id);
    $partnerCategory->delete();
    return $partnerCategory;
  }
}
