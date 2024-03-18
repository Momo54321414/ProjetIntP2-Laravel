<?php

namespace App\Http\Controllers;

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
    public function update(Request $request, String $locale, string $id)
    {

        try {
            $alert = Alert::findOrFail($id);
            
            $alert->isTheMedicationTaken = $request->isTheMedicationTaken;
            $alert->updated_at = Carbon::now();
           
            $alert->saveOrFail();
            

            if (request()->is('api/*')) {
                return response()->json(['status' => 'Alert updated successfully'], 200);
            } else {
                return redirect()->back()->with('status', 'Alert updated successfully');
            }
        } catch (\Exception $e) {
            if (request()->is('api/*')) {
                return response()->json(['error' => 'Error updating alert'], 500);
            } else {
                return redirect()->back()->with('errors', 'Error updating alert');
            }
        }
    }
}
