<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ITTrainingRequest extends FormRequest
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
      'name' => ['required', 'string', Rule::unique('i_t_trainings')->ignore($this->route('it_training'))],
      'details' => ['nullable'],
      'image' => ['image', 'mimes:png,jpg,jpeg', 'max:2048'],
      'status' => 'required',
    ];
  }


  public function messages()
  {
    return [
      'category_id.required' => 'The category name field is required.'
    ];
  }
}
