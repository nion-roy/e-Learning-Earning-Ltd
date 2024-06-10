<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserSoftwareRequest extends FormRequest
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
      'software_name' => ['required', 'string', Rule::unique('user_software')->ignore($this->route('user_software'))],
      'details' => ['nullable'],
      'image' => ['image', 'mimes:png,jpg,jpeg', 'max:2048'],
      'status' => 'required',
    ];
  }
}
