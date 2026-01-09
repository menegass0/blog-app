<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSignupRequest;
use App\Services\AuthService;
use Inertia\Inertia;

class RegisterController extends Controller
{
    public function index()
    {
        return Inertia::render('Signup');
    }

    public function register(StoreSignupRequest $request)
    {
        AuthService::register($request);

        return to_route('feed.index');
    }
}
