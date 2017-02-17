<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
{
    /**
     * @var array
     */
    protected $rules = [
        'name' => 'required|max:255',
        'department_id' => 'required|integer|exists:departments,id',
        'manager_id' => 'required|integer|exists:employees,id',
        'leader_id' => 'required|integer|exists:employees,id',
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
            'department_id.required' => 'Please select department.',
            'department_id.exists' => 'The selected department does not exists.',
            'manager_id.required' => 'Please select a manager.',
            'manager_id.exists' => 'The manager must be an active employee.',
            'leader_id.required' => 'Please select a leader.',
            'leader_id.exists' => 'The leader must be an active employee.'
        ];
    }
}
