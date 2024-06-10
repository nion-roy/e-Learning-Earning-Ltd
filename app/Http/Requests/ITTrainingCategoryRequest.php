<?php

namespace App\Http\Requests;

use App\Models\ITTrainingCategory;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ITTrainingCategoryRequest extends FormRequest
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
      'category_name' => ['required', 'string'],
      'status' => ['nullable'],
    ];

    // If it's an update request, add unique rule for title except the current cause ID
    if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
      $rules['category_name'][] = Rule::unique('i_t_training_categories')->ignore($this->route('it_training'));
    } else { // For add requests
      $rules['category_name'][] = Rule::unique('i_t_training_categories');
    }

    return $rules;
  }
}
