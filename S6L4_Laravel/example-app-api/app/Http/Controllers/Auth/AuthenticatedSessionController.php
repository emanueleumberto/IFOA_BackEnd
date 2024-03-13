<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): Response
    {
        $request->authenticate();

        $request->session()->regenerate();

        //return response()->noContent();
        $token = $request->user()->createToken('AccessToken')->plainTextToken;

        return response([
            'message' => 'User Log',
            'user' => [
                'name' => $request->user()->name,
                'email' => $request->user()->email,
                'AccessToken' => $token
                ]
        ], Response::HTTP_OK);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): Response
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        //return response()->noContent();
        return response([
            'message' => 'Logout successful'
        ], Response::HTTP_OK);
    }
}
