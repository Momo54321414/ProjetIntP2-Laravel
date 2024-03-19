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
        $alerts = DB::table('Alerts')
            ->join('Calendars', 'Alerts.calendar_id', '=', 'Calendars.id')
            ->join('Prescriptions', 'Calendars.prescription_id', '=', 'Prescriptions.id')
            ->join('Medications', 'Prescriptions.medication_id', '=', 'Medications.id')
            ->where('Prescriptions.user_id', '=', Auth::user()->id)
            ->where('Calendars.dateOfIntake', '<=', Carbon::today())
            ->where('Calendars.active', '=', 1)
            ->select('Alerts.*', 'Calendars.*', 'Medications.name as medicationName')
            ->orderBy('Calendars.dateOfIntake', 'desc')
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
