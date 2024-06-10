<?php

namespace App\Repositories;

use App\Models\ITTraining;
use App\Repositories\Interfaces\ITTrainingRepositoryInterface;

class ITTrainingRepository implements ITTrainingRepositoryInterface
{
  public function getAll()
  {
    return ITTraining::latest('id')->get();
  }

  public function getById(int $id)
  {
    return ITTraining::findOrFail($id);
  }

  public function create(array $data)
  {
    return ITTraining::createITTraining($data);
  }

  public function update(int $id, array $data)
  {
    return ITTraining::updateITTraining($id, $data);
  }

  public function destroy(int $id)
  {
    return ITTraining::destroyITTraining($id);
  }
}
