<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Traits\HttpResponses;
use Illuminate\Database\DatabaseTransactionsManager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    use HttpResponses;


    public function register(RegisterRequest $request, string $locale)
    {

        $request->validated($request->all());
        try {
            $result = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),

            ]);


            return $this->successResponse(
                ['user' => $result, 'token' => $result->createToken('API_Token' . $result->name)->plainTextToken],
                __('User_Created_Successfully'),
                201
            );
        } catch (\Exception $e) {

            return $this->errorResponse(__('Email_Already_Exists'), 400);
        } catch (DatabaseTransactionsManager $e) {

            return $this->errorResponse(__('User_Created_Failed'), 400);
        }
    }

    public function login(LoginRequest $request, string $locale)
    {


        $request->validated($request->all());

        if (!Auth::attempt($request->only('email', 'password'))) {
            return $this->errorResponse('Wrong credentials', 400);
        }
        try {
            $user = User::where('email', $request->email)->first();

            return $this->successResponse(
                [
                    'user' => $user,
                    'token' => $user->createToken('API_Token' . $user->name)->plainTextToken
                ],
                __('User_Log_In_Successfully'),
                200
            );
        } catch (\Exception $e) {

            return $this->errorResponse(__('User_Not_Found'), 400);
        }
    }

    public function updatePassword(Request $request, string $locale)
    {

        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed'
        ], [
            'current_password.required' => __('Current_Password_Required'),
            'password.required' => __('Password_Required'),
            'password.string' => __('Password_Invalid'),
            'password.min' => __('Password_Min_8'),
            'password.confirmed' => __('Password_Confirmed'),
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), 400);
        }

        $user = $request->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return $this->errorResponse(__('Password_Dont_Match'), 400);
        }

        $user->password = Hash::make($request->password);
        $user->updated_at = now();
        try {
            $user->save();

            return $this->successResponse($user, __('Password_Updated_Successfully'), 200);
        } catch (\Exception $e) {

            return $this->errorResponse(__('Password_Updated_Failed'), 400);
        }
    }

    public function updateProfile(ProfileUpdateRequest $request, string $locale)
    {

        $request->validated($request->all());
        $user = $request->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->updated_at = now();
        try {
            $user->save();
            return $this->successResponse(['user' => $user], __('Profile_Updated_Successfully'), 200);
        } catch (\Exception $e) {
            return $this->errorResponse(__('Email_Already_Exists'), 400);
        }
    }

    public function updateName(Request $request)
    {
        $charactersNotWanted = '0123456789!@#$%^&*()_+{}:"<>?\|[];,./`~';
        $name =  trim($request->name, $charactersNotWanted);

        $validator = Validator::make(['name' => $name], [
            'name' => 'required|string|max:200',
        ], [
            'name.required' => __('Name_Required'),
            'name.string' => __('Name_Invalid'),
            'name.max' => __('Name_Max'),
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), 400);
        }

        $user = $request->user();

        $user->name = $name;
        $user->updated_at = now();
        try {
            $user->save();
            return $this->successResponse($user, __('Name_Updated_Successfully'), 200);
        } catch (\Exception $e) {
            return $this->errorResponse(__('Name_Updated_Failed'), 400);
        }
    }

    public function updateEmail(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email,' . $request->user()->id,
        ], [
            'email.required' => __('Email_Required'),
            'email.email' => __('Email_Invalid'),
            'email.unique' => __('Email_Already_Exists'),
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), 400);
        }
        $user = $request->user();

        $user->email = $request->email;
        $user->updated_at = now();
        try {
            $user->save();
            return $this->successResponse($user, __('Email_Updated_Successfully'), 200);
        } catch (\Exception $e) {
            return $this->errorResponse(__('Email_Updated_Failed'), 400);
        }
    }


    public function logout(Request $request, string $locale)
    {

        try {
            $request->user()->currentAccessToken()->delete();
            return $this->successResponse(null, __('User_Logged_Out_Successfully'), 200);
        } catch (\Exception $e) {
            return $this->errorResponse(__('User_Logged_Out_Failed'), 400);
        }
    }

    public function destroy(Request $request, string $locale)
    {

        try {
            $request->user()->tokens()->delete();
            $request->user()->delete();
            return $this->successResponse(null, __('User_Deleted_Successfully'), 200);
        } catch (\Exception $e) {

            return $this->errorResponse(__('User_Deleted_Failed'), 400);
        }
    }
}
