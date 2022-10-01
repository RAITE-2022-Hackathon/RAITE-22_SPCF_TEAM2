<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// * REQUEST
use App\Http\Request\UserProfile\CreateUserProfileRequest,
    App\Http\Request\UserProfile\ShowUserProfileRequest;


// * REPOSITORY
use App\Repositories\UserProfile\CreateUserProfileRepository,
    App\Repositories\UserProfile\ShowUserProfileRepository;


class UserProfileController extends Controller
{
    protected $create, $show;

    // * CONSTRUCTOR INJECTION
    public function __construct(
        
        CreateUserProfileRepository         $create,
        ShowUserProfileRepository           $show,

    ){
        $this->create = $create;
        $this->show   = $show;

    
    }

   
    protected function create(CreateUserProfileRequest $request) {
        return $this->create->execute($request);
    }
}
