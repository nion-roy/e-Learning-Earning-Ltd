<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      'student_name' => ['required', 'string'],
      'address' => ['required', 'string'],
      'comment' => ['required', 'string'],
      'image' => ['image', 'mimes:png,jpg,jpeg', 'max:2048'],
      'status' => ['required', 'string'],
    ];
  }
}
