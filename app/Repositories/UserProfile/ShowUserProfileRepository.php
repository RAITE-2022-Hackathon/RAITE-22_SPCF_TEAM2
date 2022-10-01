<?php

namespace App\Repositories\UserProfile;

use App\Repositories\BaseRepository;
use App\Models\User;
use App\Models\UserProfile;
use Carbon\Carbon;
use Illuminate\Auth\Events\Validated;
use Illuminate\Foundation\Http\Middleware\ValidatePostSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ShowUserProfileRepository extends BaseRepository

{
    public function execute($userName){

        $userProfile = UserProfile::where(function($query) use($userName){
        $query->where("user_name", "=",  $userName)->first();}) ->firstOrFail();

    if($this->user()->$userProfile->following == 'FOLLOWING'){

    }else{

    return response(['message: You do not have permission on this user'], 401);
}
return response($response, 200);
    }
}