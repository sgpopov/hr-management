<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentsRequest extends FormRequest
{
    /**
     * @var array
     */
    protected $rules = [
        'name' => 'required|max:255',
        'manager_id' => 'required|integer|exists:employees,id'
    ];

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = $this->rules;

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'manager_id.required' => 'Please select a manager.',
            'manager_id.exists' => 'The manager must be an active employee.'
        ];
    }
}
