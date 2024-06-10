<?php

use Illuminate\Support\Facades\Route;

// $prefix = Auth::user()->slug ?? 'admin';


$prefix = request()->segment(1);

Route::group(['as' => 'admin.', 'prefix' => $prefix, 'middleware' => 'admin'], function () {
  Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('dashboard');
  Route::get('logout', [App\Http\Controllers\Admin\DashboardController::class, 'logout'])->name('logout');

  Route::resource('branches', App\Http\Controllers\Admin\BranchController::class);
  Route::resource('categories/it-training', App\Http\Controllers\Admin\ITTrainingCategoryController::class, [
    'names' => [
      'index' => 'category.it-training.index',
      'create' => 'category.it-training.create',
      'store' => 'category.it-training.store',
      'show' => 'category.it-training.show',
      'edit' => 'category.it-training.edit',
      'update' => 'category.it-training.update',
      'destroy' => 'category.it-training.destroy',
    ]
  ]);

  Route::resource('it-trainings', App\Http\Controllers\Admin\ITTrainingController::class);
  Route::resource('user-softwares', App\Http\Controllers\Admin\UserSoftwareController::class);

  //Course Route
  Route::resource('/courses/categories', App\Http\Controllers\Admin\CourseCategoryController::class, [
    'names' => [
      'index' => 'category.course.index',
      'create' => 'category.course.create',
      'store' => 'category.course.store',
      'show' => 'category.course.show',
      'edit' => 'category.course.edit',
      'update' => 'category.course.update',
      'destroy' => 'category.course.destroy',
    ]
  ]);
  Route::resource('courses', App\Http\Controllers\Admin\CourseController::class);
  //Course Route







  Route::resource('users', App\Http\Controllers\Admin\UserController::class);
  Route::resource('roles-permissions', App\Http\Controllers\Admin\RolePermissionController::class);



  Route::get('general-setting', [App\Http\Controllers\Admin\SettingController::class, 'setting'])->name('setting');
  Route::post('general-setting/update', [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('setting.update');
  Route::resource('social-setting', App\Http\Controllers\Admin\SocialController::class);


  // cache clear
  Route::get('clear-cache', [App\Http\Controllers\Admin\CacheController::class, 'clearCache'])->name('clear.cache');

});
