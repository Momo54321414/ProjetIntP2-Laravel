<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Traits\HttpResponses;


class UserController extends Controller
{
    use HttpResponses;

    public function register(RegisterRequest $request)
    {
        dd($request->all());
        $validated =  $request->validated($request->all());
        dd($validated->all());
        if ($validated->fails()) {
            return $this->errorResponse($validated->errors(), 400);
        }

        $result = User::create([
            'name' => $validated->name,
            'email' => $validated->email,
            'password' => bcrypt($validated->password),

        ]);
        
        return $this->successResponse($result, 'User created successfully', 201);
       
    }

    public function login(LoginRequest $request)
    {
        $request->validated($request->all());

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken('api-token')->plainTextToken;

            return $this->successResponse($token, 'User logged in successfully', 200);

        }

        return $this->errorResponse('Wrong credentials', 401);
    }
    public function logout(Request $request)
    {
        $request->user()->forceFill([
            'api_token' => null,
        ])->save();
        return response()->json([
            'message' => 'Logged out',
        ]);
    }


}
