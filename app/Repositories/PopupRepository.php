<?php

namespace App\Repositories;

use App\Models\Popup;
use App\Repositories\Interfaces\PopupRepositoryInterface;

class PopupRepository implements PopupRepositoryInterface
{
  public function getAll()
  {
    return Popup::latest('id')->get();
  }

  public function getById(int $id)
  {
    return Popup::findOrFail($id);
  }

  public function create(array $data)
  {
    return Popup::createPopup($data);
  }

  public function update(int $id, array $data)
  {
    return Popup::updatePopup($id, $data);
  }

  public function destroy(int $id)
  {
    return Popup::destroyPopup($id);
  }
}
