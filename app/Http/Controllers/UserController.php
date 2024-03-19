<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\ProfileUpdateRequest;
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

    public function updatePassword(Request $request)
    {
        return $this->errorResponse(__('FeatureNoAvailable'), 400);
        
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        $user = $request->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return $this->errorResponse(__('PasswordDontMatch'), 400);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return $this->successResponse(null, 'Password updated successfully', 200);
    }

    public function updateProfile(ProfileUpdateRequest $request)
    {
        return $this->errorResponse(__('FeatureNoAvailable'), 400);

        $request->validated($request->all());
        $user = $request->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return $this->successResponse($user, 'Profile updated successfully', 200);
    }

    public function updateName(Request $request)
    {
        return $this->errorResponse(__('FeatureNoAvailable'), 400);
        $request->validate([
            'name' => 'required'
        ]);

        $user = $request->user();

        $user->name = $request->name;
        $user->save();

        return $this->successResponse($user, 'Name updated successfully', 200);
    }


    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return $this->successResponse(null, __('UserLoggedOutsuccessfully'), 200);
    }

    public function destroy(Request $request)
    {
        return $this->errorResponse(__('FeatureNoAvailable'), 400);

        $request->user()->delete();

        return $this->successResponse(null, 'User deleted successfully', 200);
    }
}
