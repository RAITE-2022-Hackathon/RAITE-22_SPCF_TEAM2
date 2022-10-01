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

class CreateUserProfileRepository extends BaseRepository

{
    public function execute($request){

    $user = User::where('user_name', '=', $request->userName)->firstOrFail();

    $request->profileImage->store('profile_images', 'public');

    $userProfile = User::create([

        "user_id"       => $user->id,
        "profile_image" => $request->profileImage->hashName(),
        "following"     => strtoupper($request->following),
        "follow_status" => $request->followStatus ?? null,
        "post"          => strtoupper($request->post),
        
    ]);

   
    switch($request->following){

        case 'FOLLOWING':

    $userProfile = User::create([
        "comment"       => strtoupper($request->comment),
        "like"          => strtoupper($request->like)
    ]);

    break;

    case 'UNFOLLOW':

        return response(['message: You do not have permission to view this page'], 401);
    
        break;
    }
        
    }   
}