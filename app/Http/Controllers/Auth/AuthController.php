<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoginRequest;
use App\Services\AuthService;
use Exception;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function login(StoreLoginRequest $request)
    {
        // dd(AuthService::login($request));

        if (!AuthService::login($request)) {
            return back()->withErrors([
                'email' => 'Usuário ou senha inválidos'
            ])->onlyInput('email');
        }

        return to_route('feed.index');
    }

    public function logout()
    {
        AuthService::logout();

        return to_route('login.index');
    }
}
