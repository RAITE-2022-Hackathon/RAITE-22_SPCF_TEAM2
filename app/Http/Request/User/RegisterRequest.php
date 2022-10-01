<?php

namespace App\Http\Request\User;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            
            "firstName"   => ["required","string"],
            "lastName"    => ["required","string"],
            "phoneNumber" => ["required","digits:11"],
            "address"     => ["required","string"],
            "gender"      => ["required","string","in:MALE,FEMALE"],
            "birthDate"   => ["required","date"],
            "userName"    => ["required","string","unique:users,user_name"],
            "email"       => ["required","string","email","unique:users,email"],
            "password"    => ["required","string","min:3","confirmed"]

        ];
    }
}
