<?php

namespace App\Repositories;

use App\Models\ITTrainingCategory;
use App\Repositories\Interfaces\ITTrainingCategoryRepositoryInterface;

class ITTrainingCategoryRepository implements ITTrainingCategoryRepositoryInterface
{
  public function getAll()
  {
    return ITTrainingCategory::latest('id')->get();
  }

  public function getById(int $id)
  {
    return ITTrainingCategory::findOrFail($id);
  }

  public function create(array $data)
  {
    return ITTrainingCategory::createITTrainingCategory($data);
  }

  public function update(int $id, array $data)
  {
    return ITTrainingCategory::updateITTrainingCategory($id, $data);
  }

  public function destroy(int $id)
  {
    return ITTrainingCategory::destroyITTrainingCategory($id);
  }
}
