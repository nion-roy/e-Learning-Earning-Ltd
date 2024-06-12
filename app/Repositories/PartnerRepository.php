<?php

namespace App\Repositories;

use App\Models\Partner;
use App\Repositories\Interfaces\PartnerRepositoryInterface;

class PartnerRepository implements PartnerRepositoryInterface
{
  public function getAll()
  {
    return Partner::latest('id')->get();
  }

  public function getById(int $id)
  {
    return Partner::findOrFail($id);
  }

  public function create(array $data)
  {
    return Partner::createPartner($data);
  }

  public function update(int $id, array $data)
  {
    return Partner::updatePartner($id, $data);
  }

  public function destroy(int $id)
  {
    return Partner::destroyPartner($id);
  }
}
