<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
{
    /**
     * @var array
     */
    protected $rules = [
        'name' => 'required',
        'email' => 'required|unique:users,email',
        'role_id' => 'required',
        'role_id.*' => 'exists:roles,id',
        'picture' => 'sometimes|mimes:jpeg,png'
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
            $rules['email'] .= ',' . $this->user->id;

            if ($this->get('new_password')) {
                $rules['old_password'] = 'required|oldpassword';
                $rules['new_password'] = 'required|min:6';
                $rules['confirm_password'] = 'required|same:new_password';
            }
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
            'role_id.required' => 'The role field is required.',
            'old_password.oldpassword' => 'Ivalid password.'
        ];
    }
}
