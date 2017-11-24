<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentsRequest extends FormRequest
{
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
        $rules = [
            'title' => 'required',
            'content' => 'required'
        ];

        if ($this->has('employee_id') && $this->get('employee_id') !== null) {
            $rules['employee_id'] = 'required|int|exists:employees,id';
        }

        return $rules;
    }
}
