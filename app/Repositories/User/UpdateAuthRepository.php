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

class UpdateAuthRepository extends BaseRepository

{
    public function execute($request, $referenceNumber){

        $user = User::where('reference_number','=', $referenceNumber)->first();

        $user->update([

        "first_name"       => strtoupper($request->firstName),
        "last_name"        => strtoupper($request->lastName),
        "phone_number"     => $request->phoneNumber,
        "address"          => strtoupper($request->address),
        "gender"           => strtoupper($request->gender),
        "birth_date"       => $request->birthDate,
        "user_name"        => $request->userName,
        "email"            => $request->email,
        "password"         => Hash::make($request['password']),

        ]);

        return response(['message: Account Updated Successfully'], 200);
        
    }
}