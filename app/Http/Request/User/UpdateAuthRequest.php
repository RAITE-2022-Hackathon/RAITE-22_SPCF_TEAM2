<?php

namespace App\Http\Request\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class UpdateAuthRequest extends FormRequest
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
    public function rules(User $user)
    {
        return [
            
            "firstName"   => ["nullable","string"],
            "lastName"    => ["nullable","string"],
            "phoneNumber" => ["nullable","digits:11"],
            "address"     => ["nullable","string"],
            "gender"      => ["nullable","string","in:MALE,FEMALE"],
            "birthDate"   => ["nullable","date"],
            "userName"    => ["nullable","string","unique:users,user_name".$user->id],
            "email"       => ["nullable","string","email","unique:users,email".$user->id],
            "password"    => ["nullable","string","min:3","confirmed"]

        ];
    }
}
