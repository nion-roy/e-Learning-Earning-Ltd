<?php

namespace App\Repositories;

use App\Models\CourseCategory;
use App\Repositories\Interfaces\CourseCategoryRepositoryInterface;

class CourseCategoryRepository implements CourseCategoryRepositoryInterface
{
  public function getAll()
  {
    return CourseCategory::latest('id')->get();
  }

  public function getById(int $id)
  {
    return CourseCategory::findOrFail($id);
  }

  public function create(array $data)
  {
    return CourseCategory::createCourseCategory($data);
  }

  public function update(int $id, array $data)
  {
    return CourseCategory::updateCourseCategory($id, $data);
  }

  public function destroy(int $id)
  {
    return CourseCategory::destroyCourseCategory($id);
  }
}
