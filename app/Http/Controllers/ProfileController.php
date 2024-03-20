<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Log;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $logs = DB::table('logs')
            ->join('devices', 'logs.device_id', '=', 'devices.id')
            ->select('logs.*', 'devices.noSerie as noSerie')
            ->where('devices.user_id', Auth::user()->id)
            ->get();

        return view('profile.edit', [
            'user' => $request->user(),
            'logs' => $logs,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = User::findOrFail(Auth::user()->id);
        $validated = $request->validated();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->updated_at = Carbon::now();

        try {
            $user->save();
            $message =  __('Profile_Updated_Successfully');
        } catch (\Exception $e) {
            $message =  __('Profile_Updated_Failed');
        }

        return Redirect::route('profile.edit')->with('status', $message);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
