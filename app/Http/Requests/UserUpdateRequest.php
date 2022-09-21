<?php

namespace App\Http\Requests;
use App\models\User;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => 'sometimes|nullable',
            'email' => 'sometimes|nullable|unique:users,email,'.request()->route('user')->id.'|min:5|max:191',
            'password' => 'sometimes|nullable|string|min:8|max:255',
        ];
    }

    public function getData(User $user)
    {
        $data = $this->only('name', 'email', 'password'); 
        if($this->email != $user->email){
            $user->email = $data['email'];
        }
        if($this->password) {
            $data['password'] = bcrypt($this->password);
        }

        return $data;
    }
}
