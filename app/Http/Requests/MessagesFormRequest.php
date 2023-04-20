<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class MessagesFormRequest extends FormRequest
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
            'date' => 'string|min:1|nullable',
            'topic' => 'string|min:1|nullable',
            'user' => 'string|min:1|nullable',
            'message' => 'numeric|nullable',
        ];

        return $rules;
    }
    
    /**
     * Get the request's data from the request.
     *
     * 
     * @return array
     */
    public function getData()
    {
        $data = $this->only(['date', 'topic', 'user', 'message']);

        return $data;
    }

}
