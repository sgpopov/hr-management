<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentTemplateRequest extends FormRequest
{
    protected $rules = [
        'title' => 'required|unique:document_templates,title',
        'content' => 'required'
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
            $rules['title'] .= ',' . $this->template->id;
        }

        return $rules;
    }
}
