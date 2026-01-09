<?php

namespace App\Services;

use App\Http\Requests\StoreSignupRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public static function register(StoreSignupRequest $request)
    {
        DB::beginTransaction();

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        Auth::login($user);

        DB::commit();
    }
}
