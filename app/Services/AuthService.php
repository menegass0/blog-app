<?php

namespace App\Services;

use App\Http\Requests\StoreSignupRequest;

class AuthService
{
    public function register(StoreSignupRequest $request)
    {
        dd($request->all());
    }
}
