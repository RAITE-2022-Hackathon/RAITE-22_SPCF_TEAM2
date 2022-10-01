<?php

namespace App\Traits;

use Carbon\Carbon;

use App\Models\User;
    

trait Generator
{
    protected function userReferenceNumber(){
        do {

            $referenceNumber = bin2hex(random_bytes(7));

        } while (User::where("reference_number", "=", $referenceNumber)->first());

        return $referenceNumber;

    }
}
