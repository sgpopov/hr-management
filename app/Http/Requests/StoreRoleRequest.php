<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
{
    protected $rules = [
        'name' => 'required|max:255|unique:roles,name',
        'description' => 'max:255',
        'route_id' => 'required',
        'route_id.*' => 'required|integer|exists:routes,id'
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
            $rules['name'] .= ',' . $this->role->id;
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
            'route_id.required' => 'Please select at least one route.'
        ];
    }
}
