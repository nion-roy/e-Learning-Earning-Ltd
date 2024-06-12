<?php

namespace App\Repositories;

use App\Models\PartnerCategory;
use App\Repositories\Interfaces\PartnerCategoryRepositoryInterface;

class PartnerCategoryRepository implements PartnerCategoryRepositoryInterface
{
  public function getAll()
  {
    return PartnerCategory::latest('id')->get();
  }

  public function getById(int $id)
  {
    return PartnerCategory::findOrFail($id);
  }

  public function create(array $data)
  {
    return PartnerCategory::createPartnerCategory($data);
  }

  public function update(int $id, array $data)
  {
    return PartnerCategory::updatePartnerCategory($id, $data);
  }

  public function destroy(int $id)
  {
    return PartnerCategory::destroyPartnerCategory($id);
  }
}
