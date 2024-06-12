<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable, HasRoles;

  public function isOnline()
  {
    return Cache::has('user-is-online-' . $this->id);
  }


  public static function createUser($requestData)
  {
    $user = new User();
    $user->name = $requestData['name'];
    $user->slug = Str::slug($user->name);
    $user->username = $requestData['username'];
    $user->email = $requestData['email'];
    $user->role = $requestData['role'];
    $user->password = Hash::make(12345678);
    $user->image = self::userImage($requestData) ?? 'user.png';
    $user->save();

    $user->syncRoles($requestData['role']);
    return $user;
  }


  public static function updateUser($id, $requestData)
  {
    $user = User::findOrFail($id);
    $user->name = $requestData['name'];
    $user->slug = Str::slug($user->name);
    $user->username = $requestData['username'];
    $user->email = $requestData['email'];
    $user->role = $requestData['role'];

    if (isset($requestData['image'])) {
      // Unlink old image
      if ($user->image && file_exists(public_path('storage/users/') . $user->image)) {
        unlink(public_path('storage/users/') . $user->image);
      }
      $user->image = self::userImage($requestData);
    }

    $user->update();
    return $user;
  }


  public static function destroyUser($id)
  {
    $user = User::findOrFail($id);

    // Unlink image when delete user
    if ($user->image && file_exists(public_path('storage/users/') . $user->image)) {
      unlink(public_path('storage/users/') . $user->image);
    }

    $user->delete();
    return $user;
  }


  public static function userImage($requestData, $user = null)
  {
    if (isset($requestData['image'])) {
      $image = $requestData['image'];
      $imageName = uniqid() . '.' . $image->getClientOriginalExtension();

      // Save original image
      $image->move(public_path('storage/users'), $imageName);

      // create new manager instance with desired driver
      $imgManager = new ImageManager(new Driver());
      $imagePath = $imgManager->read(public_path('storage/users/') . $imageName);

      // Resize image
      $imagePath->resize(460, 460);
      $imagePath->save();

      return $imageName;
    }
  }


  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'name',
    'email',
    'password',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];
}
