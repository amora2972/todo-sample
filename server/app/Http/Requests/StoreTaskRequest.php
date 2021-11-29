<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
            'title' => 'required|max:255',
            'description' => '',
            'status' => 'in:0,1',
            // TODO:: validate due date and due time
            'due_date' => '',
            'due_time' => '',
            'user_id' => 'exists:users,id',
        ];
    }
}
