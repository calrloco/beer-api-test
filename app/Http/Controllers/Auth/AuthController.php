<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Store a newly created resource in storage.
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $issuedToken = $request->user()->createToken('token');

        return [
            'message' => 'success',
            'token' => $issuedToken->plainTextToken
        ];
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): array
    {
        $request->user()->tokens()->delete();

        return [
            'message' => 'logged out'
        ];
    }
}
