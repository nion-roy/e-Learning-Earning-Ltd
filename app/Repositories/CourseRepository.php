<?php

namespace App\Repositories;

use App\Models\Course;
use App\Repositories\Interfaces\CourseRepositoryInterface;

class CourseRepository implements CourseRepositoryInterface
{
  public function getAll()
  {
    return Course::latest('id')->get();
  }

  public function getById(int $id)
  {
    return Course::findOrFail($id);
  }

  public function create(array $data)
  {
    return Course::createCourse($data);
  }

  public function update(int $id, array $data)
  {
    return Course::updateCourse($id, $data);
  }

  public function destroy(int $id)
  {
    return Course::destroyCourse($id);
  }
}
