<?php

namespace App\Repositories;

use App\Models\HeaderSlider;
use App\Repositories\Interfaces\HeaderSliderRepositoryInterface;

class HeaderSliderRepository implements HeaderSliderRepositoryInterface
{
  public function getAll()
  {
    return HeaderSlider::latest('id')->get();
  }

  public function getById(int $id)
  {
    return HeaderSlider::findOrFail($id);
  }

  public function create(array $data)
  {
    return HeaderSlider::createHeaderSlider($data);
  }

  public function update(int $id, array $data)
  {
    return HeaderSlider::updateHeaderSlider($id, $data);
  }

  public function destroy(int $id)
  {
    return HeaderSlider::destroyHeaderSlider($id);
  }
}
