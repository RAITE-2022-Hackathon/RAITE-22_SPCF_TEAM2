<?php

namespace App\Http\Request\UserProfile;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserProfileRequest extends FormRequest
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
            
            "profileImage" => ["nullable","file","mimes:jpeg,jpg,png,pdf","max:5000"],
            "following"    => ["nullable","string","in:FOLLOWING,UNFOLLOW"],
            "followStatus" => ["nullable"],
            "post"         => ["nullable","string"],
            "comment"      => ["nullable","string"],
            "like"         => ["nullable","string","in:LIKE,UNLIKE"],

        ];
    }
}
