<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserBirthdayUpdateRequest extends FormRequest
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
            'birthday' => ['required']
        ];
    }

    public function getData(){
        $data = $this->only('birthday');
        return $data;
    }
}
