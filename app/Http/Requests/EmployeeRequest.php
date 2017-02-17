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
        'hired_on' => 'required|date',
        'passport.number' => 'required',
        'passport.issue_by' => 'required',
        'passport.issue_date' => 'required|date|before:tomorrow',
        'passport.valid_until' => 'required|date|after:today',
        'passport.address' => 'required',
        'picture' => 'sometimes|base64Image'
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
            'passport.number.required' => 'The passport number field is required.',
            'passport.issue_by.required' => 'The passport issue by field is required.',
            'passport.issue_date.required' => 'The passport issue date field is required.',
            'passport.issue_date.date' => 'The issue date field must be valid date.',
            'passport.issue_date.before' => 'The passport must be issued either today or in the past.',
            'passport.valid_until.required' => 'The passport valid until field is required.',
            'passport.valid_until.date' => 'The valid until field must be valid date.',
            'passport.valid_until.after' => 'The passport must be valid for at least a day.',
            'passport.address' => 'The address field is required.'
        ];
    }
}
