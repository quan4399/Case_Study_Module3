<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'=>'required|min:6|max:32',
            'email' => 'required|email:rfc,dns|unique:users',
            'password'=>'required|min:6',
            'password_confirm'=>'required|same:password',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'khong de trong',
            'name.min'=> 'it nhat 6 ky tu',
            'name.max'=> 'nhieu nhat 32 ky tu',
            'email.required' => 'email ko de trong',
            'email.email' => 'Email khong dung format',
            'email.unique' => 'Email da ton tai',
            'password.min' => 'Mat khau toi thieu 6 ki tu',
            'password_confirm.same' => 'Khong giong mat khau cu',
            'password_confirm.required' => 'Mat khau khong de trong'
        ];
    }
}
