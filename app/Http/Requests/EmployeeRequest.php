<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * @var array
     */
    protected $rules = [
        'first_name' => 'required|max:255',
        'family_name' => 'required|max:255',
        'fullname' => 'required|max:255',
        'email' => 'required|email|unique:employees,email',
        'team_id' => 'required|integer|exists:teams,id',
        'hired_on' => 'required|date'
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

        if ($this->method() === 'PATCH') {
            $rules['email'] .= ',' . $this->employee->id;
        }

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
            'team_id.required' => 'Please select a team.',
            'team_id.exists' => 'The selected team does not exists.',
        ];
    }
}
