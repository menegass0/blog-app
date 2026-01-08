<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSignupRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RegisterController extends Controller
{
    public function index()
    {
        return Inertia::render('Signup');
    }

    public function register(StoreSignupRequest $request)
    {

        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
        // return json_encode(['teste' => '123']);
    }
}
