<?php

namespace App\Repositories;

use App\Models\Testimonial;
use App\Repositories\Interfaces\TestimonialRepositoryInterface;

class TestimonialRepository implements TestimonialRepositoryInterface
{
  public function getAll()
  {
    return Testimonial::latest('id')->get();
  }

  public function getById(int $id)
  {
    return Testimonial::findOrFail($id);
  }

  public function create(array $data)
  {
    return Testimonial::createTestimonial($data);
  }

  public function update(int $id, array $data)
  {
    return Testimonial::updateTestimonial($id, $data);
  }

  public function destroy(int $id)
  {
    return Testimonial::destroyTestimonial($id);
  }
}
