<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index(Request $request)
    {
        return $request->user();

    }
    public function alluser(Request $request)
{
    $users = User::all();
    return response()->json($users);
}

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

    $result = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            
        ]);

        return $result;
    }

    public function login(LoginRequest $request)
    {
        $credentials=$request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
// je me suis arreté ici
        if(Auth::attempt($credentials))
            {

            $user = Auth::user();
            $token = $user->createToken('token-name')->plainTextToken;
            $token = bcrypt(str(random_bytes(60)));
            $user->forceFill([
                'api_token' => $token,
            
            ])->save();
            return response()->json([
                'token' => $token,
                'user' => $user,
                
            ]);


            }
            return response()->json([
                'message' => 'Invalid credentials',
            ]);

    //
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

