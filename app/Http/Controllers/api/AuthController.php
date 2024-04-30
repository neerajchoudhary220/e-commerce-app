<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignUpRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function signup(SignUpRequest $request)
    {
        try {
            $input = $request->only('name', 'password', 'email');
            User::create($input);
            return response()->json([
                'message' => "Successfully signed up"
            ]);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function login(LoginRequest $request)
    {
        try {
            $auth_attempt = Auth::attempt($request->only('email','password'));
            if (!$auth_attempt) {
                return response()->json([
                    'message' => 'error',
                    'error' => 'Invalid login attempt'
                ]);
            }
            // $token = $request->user()->createToken('secrettoken',['server:update'])->plainTextToken;
            $token = $request->user()->createToken('secrettoken',['server:update','view:task'])->plainTextToken;

            return response()->json([
                'token' => $token,
            ]);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
