<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Calendar;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
   
        
        //check if the route is an API
        if (request()->is('api/*')) {
            $calendar = DB::table('calendars')
            ->join('prescriptions', 'calendar.prescription_id', '=', 'prescriptions.id')
            ->join('users', 'prescriptions.user_id', '=', 'users.id')
            ->where('prescriptions.user_id', Auth::user()->id)
            ->select('calendars.*')
            ->get();
            return response()->json($calendar);
        }
        else {
            $calendar = DB::table('calendars')
            ->join('prescriptions', 'calendar.prescription_id', '=', 'prescriptions.id')
            ->join('users', 'prescriptions.user_id', '=', 'users.id')
            ->join('medications', 'prescriptions.medication_id', '=', 'medications.id')
            ->select('calendar.dateOfIntake as dateOfIntake', 
                'calendar.timeOfIntake as timeOfIntake',
             'prescriptions.nameOfPrescription as prescriptionName',
             'medications.name as medicationName',)
            ->where('prescriptions.user_id', Auth::user()->id)
            ->get();    
            return view('calendar.index', [
                'calendar' => $calendar,
            ]);
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $calendar = new Calendar();
        $calendar->date = $request->date;
        $calendar->time = $request->time;
     
        $calendar->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
