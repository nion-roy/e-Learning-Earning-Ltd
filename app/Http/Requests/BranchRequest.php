<?php

namespace App\Http\Requests;

use App\Models\Branch;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BranchRequest extends FormRequest
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
      'branch_name' => ['required', 'string'],
      'address' => ['required', 'string'],
      'email_1' => ['required', 'email', 'lowercase'],
      'email_2' => ['nullable', 'email', 'lowercase'],
      'contact_1' => ['required', 'numeric', 'min_digits:11', 'max_digits:11'],
      'contact_2' => ['nullable', 'numeric', 'min_digits:11', 'max_digits:11'],
      'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp', 'max:2048'],
      'status' => ['required'],
    ];

    // If it's an update request, add unique rule for branch except the current branch ID
    if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
      $rules['branch_name'][] = Rule::unique('branches')->ignore($this->route('branch'));
    } else { // For add requests
      $rules['branch_name'][] = Rule::unique('branches');
    }

    return $rules;
  }

  public function messages(): array
  {
    return [
      'email_1.required' => 'The email field is required.',
      'email_2.required' => 'The email field is required.',
      'contact_1.required' => 'The contact number field is required.',
      'contact_2.required' => 'The contact number field is required.',
    ];
  }
}
