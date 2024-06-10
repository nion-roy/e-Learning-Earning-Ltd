<?php

namespace App\Repositories;

use App\Models\UserSoftware;
use App\Repositories\Interfaces\UserSoftwareRepositoryInterface;

class UserSoftwareRepository implements UserSoftwareRepositoryInterface
{
  public function getAll()
  {
    return UserSoftware::latest('id')->get();
  }

  public function getById(int $id)
  {
    return UserSoftware::findOrFail($id);
  }

  public function create(array $data)
  {
    return UserSoftware::createUserSoftware($data);
  }

  public function update(int $id, array $data)
  {
    return UserSoftware::updateUserSoftware($id, $data);
  }

  public function destroy(int $id)
  {
    return UserSoftware::destroyUserSoftware($id);
  }
}
