<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $prescriptions = DB::table('prescriptions')
            ->join('medications', 'prescriptions.medication_id', '=', 'medications.id')
            ->select('medications.*')
            ->where('prescriptions.user_id', Auth::user()->id)
            ->get();
            
        $medications = DB::table('medications')
            ->select('medications.*')
            ->get();

        $maxDate = Carbon::now()->toDateString();
        $minDate = Carbon::now()->subYearNoOverflow(1)->toDateString();
        $maxDateForStart = Carbon::now()->addDays(30)->toDateString();
        

        return view('profile.edit', [
            'user' => $request->user(),
            'prescriptions' => $prescriptions,
            'medications' => $medications,
            'maxDate' => $maxDate,
            'minDate' => $minDate,
            'maxDateForStart' => $maxDateForStart,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
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
