<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // TODO: Please use array notation
            'taskTitle' => 'required|max:300',
            'description' => 'sometimes|nullable',
            'date' => 'required',
        ];
    }

    /**
     * Used for updating task updating.
     *
     * @return array<string, mixed>
     */
    public function getData()
    {
        $data = $this->only('taskTitle', 'date');
        if(!is_null($this->description)){
            $data['description'] = $this->description;
        }
        return $data;
    }
}
