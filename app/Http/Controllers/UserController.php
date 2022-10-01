<?php

namespace App\Http\Controllers;

// * REQUEST
use App\Http\Request\User\LoginRequest,
    App\Http\Request\User\RegisterRequest,
    App\Http\Request\User\LogoutRequest;


// * REPOSITORY
use App\Repositories\User\LoginRepository,
    App\Repositories\User\RegisterRepository,
    App\Repositories\User\LogoutRepository;


class UserController extends Controller
{
   protected $login, $register, $logout;

    // * CONSTRUCTOR INJECTION
    public function __construct(
        
        LoginRepository              $login,
        RegisterRepository           $register,
        LogoutRepository             $logout,
       

    ){
        $this->login    = $login;
        $this->register = $register;
        $this->logout   = $logout;
    
    }

   
    protected function login(LoginRequest $request) {
        return $this->login->execute($request);
    }

    protected function register(RegisterRequest $request) {
        return $this->register->execute($request);
    }
    
    protected function logout(LogoutRequest $request) {
        return $this->logout->execute($request);
    }

   
}
