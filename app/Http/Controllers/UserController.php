<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    use HttpResponses;


    public function register(RegisterRequest $request)
    {
        $request->validated($request->all());

        $result = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);


        return $this->successResponse(
            ['user' => $result, 'token' => $result->createToken('API_Token' . $result->name)->plainTextToken],
            'User created successfully',
            201
        );
    }

    public function login(LoginRequest $request)
    {
        $request->validated($request->all());

        if (!Auth::attempt($request->only('email', 'password'))) {
            return $this->errorResponse('Wrong credentials', 400);
        }

        $user = User::where('email', $request->email)->first();

        return $this->successResponse(
            ['user' => $user, 'token' => $user->createToken('API_Token' . $user->name)->plainTextToken],
            'User logged in successfully',
            200
        );
    }
    


    public function logout(Request $request)
    {
       $request->user()->currentAccessToken()->delete();

        return $this->successResponse(null, 'User logged out successfully', 200);
    }
}
