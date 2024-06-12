<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HeaderSliderRequest extends FormRequest
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
    $rules = [
      'title' => ['required', 'string'],
      'status' => ['required', 'string'],
    ];

    if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
      $rules['image'][] = ['image', 'mimes:png,jpg,jpeg', 'max:2048'];
    } else { // For add requests
      $rules['image'][] = ['required', 'image', 'mimes:png,jpg,jpeg', 'max:2048'];
    }

    return $rules;
  }
}
