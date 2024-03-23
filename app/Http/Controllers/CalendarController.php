<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Calendar;
use App\Traits\HttpResponses;

class CalendarController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
   
        if (request()->is('api/*')) {
            try{
            $calendar = DB::table('calendars')
            ->join('prescriptions', 'calendars.prescription_id', '=', 'prescriptions.id')
            ->join('users', 'prescriptions.user_id', '=', 'users.id')
            ->where('prescriptions.user_id', Auth::user()->id)
            ->select('calendars.*')
            ->get();
            return $this->successResponse(['calendars'=>$calendar], __('Calendars_Retrieved_Successfully'), 200);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        } catch (\Throwable $e) {
            return $this->errorResponse($e->getMessage(), 500);
        } catch (\Error $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
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
    public function store(Request $request,string $locale,)
    {
        $calendar = new Calendar();
        $calendar->date = $request->date;
        $calendar->time = $request->time;
     
        $calendar->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $locale,string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $locale,string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $locale, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $locale,string $id)
    {
        //
    }
}
