<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskCreateRequest extends FormRequest
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
            //
            'taskTitle' => 'required|max:300',
            'description' => 'sometimes|nullable',
            'date' => 'required',
        ];
    }

    /**
     * Assign userId to array and set data.
     *
     * @return array<string, mixed>
     */
    public function getData()
    {
        $data = $this->only('taskTitle', 'date');
        $data['user_id']= auth()->user()->id;
        // TODO: this depends on the DB design, but if you do allow empty input, try considering the nullable() DB fields
        if(!is_null($this->description)){
            $data['description'] = $this->description;
        }
        else{
            $data['description'] ="";
        }
        return $data;
    }
}
