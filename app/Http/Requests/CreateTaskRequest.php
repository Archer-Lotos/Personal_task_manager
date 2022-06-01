<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
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
        return [
            'task_name' => 'required|string|min:2|max:255',
            'description' => 'required|string|min:5',
            'tags' => 'array'
        ];
    }

    public function attributes()
    {
        return [
            'task_name' => 'task_name',
            'description' => 'description',
            'tags' => 'tags'
        ];
    }
}
