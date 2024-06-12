<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PartnerRequest extends FormRequest
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
      'category_id' => ['required'],
      'partner_name' => ['required', 'string', Rule::unique('partners')->ignore($this->route('all_partner'))],
      'details' => ['nullable'],
      'image' => ['image', 'mimes:png,jpg,jpeg', 'max:2048'],
      'status' => 'required',
    ];
  }


  public function messages()
  {
    return [
      'category_id.required' => 'The partner category field is required.'
    ];
  }
}
