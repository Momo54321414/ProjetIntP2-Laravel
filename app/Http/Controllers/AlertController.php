<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlertRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Alert;
use Carbon\Carbon;
use App\Traits\HttpResponses;
use App\Http\Resources\AlertsResource;

class AlertController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alerts = DB::table('alerts')
            ->join('calendars', 'alerts.calendar_id', '=', 'calendars.id')
            ->join('prescriptions', 'calendars.prescription_id', '=', 'prescriptions.id')
            ->join('medications', 'prescriptions.medication_id', '=', 'medications.id')
            ->where('prescriptions.user_id', '=', Auth::user()->id)
            ->where('calendars.dateOfIntake', '<=', Carbon::today())
            ->where('calendars.active', '=', 1)
            ->select('Alerts.*', 'calendars.*', 'medications.name as medicationName')
            ->orderBy('calendars.dateOfIntake', 'desc')
            ->get();

        if (request()->is('api/*')) {

            return  AlertsResource::collection($alerts);
        } else {

            return view('alerts.index', [
                'alerts' => $alerts,
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AlertRequest $request, string $id)
    {
        $alert = Alert::findOrFail($id);
        $validated = $request->validated();
        $alert->isTheMedicationTaken = $validated['isTheMedicationTaken'];
        $alert->updated_at = Carbon::now();

        try {
            $alert->save();

            $message = ['status' => __('Alert_Updated_Successfully')];
        } catch (\Exception $e) {
            $message = ['error' => __('Alert_Updated_Failed')];
        }

        if (request()->is('api/*')) {
            return response()->json($message);
        } else {
            return redirect()->back()->with($message);
        }
    }
}
