<?php

namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Validated;
use Illuminate\Foundation\Http\Middleware\ValidatePostSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterRepository extends BaseRepository

{
    public function execute($request){

    $user = User::create([

        "reference_number" => $this->userReferenceNumber(),
        "first_name"       => strtoupper($request->firstName),
        "last_name"        => strtoupper($request->lastName),
        "phone_number"     => $request->phoneNumber,
        "address"          => strtoupper($request->address),
        "gender"           => strtoupper($request->gender),
        "birth_date"       => $request->birthDate,
        "user_name"        => strtoupper($request->userName),
        "email"            => strtoupper($request->email),
        "password"         => Hash::make($request['password']),
    ]);

    $token = $user->createToken('User Password Grant Client')->plainTextToken;

    $response = [
        'user'  => $user,
        'token' => $token,
    ];

    return response($response, 200);

    }   
}