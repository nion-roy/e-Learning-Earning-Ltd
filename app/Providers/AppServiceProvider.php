<?php

namespace App\Providers;

use App\Repositories\BranchRepository;
use App\Repositories\CourseRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\ITTrainingRepository;
use App\Repositories\UserSoftwareRepository;
use App\Repositories\CourseCategoryRepository;
use App\Repositories\ITTrainingCategoryRepository;
use App\Repositories\Interfaces\BranchRepositoryInterface;
use App\Repositories\Interfaces\CourseRepositoryInterface;
use App\Repositories\Interfaces\ITTrainingRepositoryInterface;
use App\Repositories\Interfaces\UserSoftwareRepositoryInterface;
use App\Repositories\Interfaces\CourseCategoryRepositoryInterface;
use App\Repositories\Interfaces\ITTrainingCategoryRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    $this->app->bind(ITTrainingCategoryRepositoryInterface::class, ITTrainingCategoryRepository::class);
    $this->app->bind(ITTrainingRepositoryInterface::class, ITTrainingRepository::class);
    $this->app->bind(CourseRepositoryInterface::class, CourseRepository::class);
    $this->app->bind(CourseCategoryRepositoryInterface::class, CourseCategoryRepository::class);
    $this->app->bind(BranchRepositoryInterface::class, BranchRepository::class);
    $this->app->bind(UserSoftwareRepositoryInterface::class, UserSoftwareRepository::class);
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    //
  }
}
