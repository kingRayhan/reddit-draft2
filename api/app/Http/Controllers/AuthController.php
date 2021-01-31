<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class AuthController extends Controller
{
    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['login', 'register']);
    }

    public function login(LoginRequest $request)
    {
        if (!auth()->guard()->attempt($request->all()))
            throw new AuthenticationException('Invalid credential');

        $agent = new Agent();

        $token = auth()->user()->createToken(
            json_encode(
                [
                    'browser' => $agent->browser(),
                    'platform/OS' => $agent->platform(),
                    'device-type' => $agent->deviceType()
                ]
            )
        )->plainTextToken;

        return response()->json([
            'message' => 'Successfully logged in',
            'token' => $token
        ]);
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create($request->all());

        return response()->json([
            'message' => 'successfully registered',
            'data' => $user
        ]);
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        auth()->user()->update($request->all(['username','email']));
        return response()->json([
            'message' => 'Profile updated successfully',
        ]);
    }

    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'successfully logout'
        ]);
    }

    public function user()
    {
        return auth()->user();
    }
}
