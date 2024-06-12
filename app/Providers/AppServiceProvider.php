<?php

namespace App\Providers;

use App\Repositories\UserRepository;
use App\Repositories\PopupRepository;
use App\Repositories\BranchRepository;
use App\Repositories\CourseRepository;
use App\Repositories\PartnerRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\ITTrainingRepository;
use App\Repositories\TestimonialRepository;
use App\Repositories\HeaderSliderRepository;
use App\Repositories\UserSoftwareRepository;
use App\Repositories\CourseCategoryRepository;
use App\Repositories\PartnerCategoryRepository;
use App\Repositories\ITTrainingCategoryRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\PopupRepositoryInterface;
use App\Repositories\Interfaces\BranchRepositoryInterface;
use App\Repositories\Interfaces\CourseRepositoryInterface;
use App\Repositories\Interfaces\PartnerRepositoryInterface;
use App\Repositories\Interfaces\ITTrainingRepositoryInterface;
use App\Repositories\Interfaces\TestimonialRepositoryInterface;
use App\Repositories\Interfaces\HeaderSliderRepositoryInterface;
use App\Repositories\Interfaces\UserSoftwareRepositoryInterface;
use App\Repositories\Interfaces\CourseCategoryRepositoryInterface;
use App\Repositories\Interfaces\PartnerCategoryRepositoryInterface;
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
    $this->app->bind(PartnerCategoryRepositoryInterface::class, PartnerCategoryRepository::class);
    $this->app->bind(PartnerRepositoryInterface::class, PartnerRepository::class);
    $this->app->bind(TestimonialRepositoryInterface::class, TestimonialRepository::class);
    $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    $this->app->bind(HeaderSliderRepositoryInterface::class, HeaderSliderRepository::class);
    $this->app->bind(PopupRepositoryInterface::class, PopupRepository::class);
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    //
  }
}
