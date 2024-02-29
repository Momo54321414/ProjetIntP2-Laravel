<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            if (request()->is('api/*')) {
                $calendar = DB::table('calendar')
                    ->join('prescriptions', 'calendar.prescription_id', '=', 'prescriptions.id')
                    ->join('users', 'prescriptions.user_id', '=', 'users.id')
                    ->join('medications', 'prescriptions.medication_id', '=', 'medications.id')
                    ->select(
                        'calendar.dateOfIntake as dateOfIntake',
                        'calendar.timeOfIntake as timeOfIntake',
                        'prescriptions.nameOfPrescription as prescriptionName',
                        'medications.name as medicationName'
                    )
                    ->get();
            } else {
                $calendar = DB::table('calendar')
                    ->join('prescriptions', 'calendar.prescription_id', '=', 'prescriptions.id')
                    ->join('users', 'prescriptions.user_id', '=', 'users.id')
                    ->join('medications', 'prescriptions.medication_id', '=', 'medications.id')
                    ->select(
                        'calendar.dateOfIntake as dateOfIntake',
                        'calendar.timeOfIntake as timeOfIntake',
                        'prescriptions.nameOfPrescription as prescriptionName',
                        'medications.name as medicationName',
                    )
                    ->where('prescriptions.user_id', Auth::user()->id)
                    ->get();
            }
        } catch (\Exception $e) {

            if (request()->is('api/*')) {
                return response()->json(['error' => $e->getMessage()], 500);
            } else {
                return redirect()->back()->with('error', $e->getMessage());
            }
        } finally {
            if (request()->is('api/*')) {
                return response()->json($calendar, 200);
            } else {
                return view('calendar.index', [
                    'calendar' => $calendar,
                ]);
            }
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
        try {
            $calendar = new Calendar();
            $calendar->dateOfIntake = $request->dateOfIntake;
            $calendar->hourOfIntake = $request->hourOfIntake;
            $calendar->save();
        } catch (\Exception $e) {
            if (request()->is('api/*')) {
                return response()->json(['error' => $e->getMessage()], 500);
            } else {
                return redirect()->back()->with('error', $e->getMessage());
            }
        } finally {
            if (request()->is('api/*')) {
                return response()->json($calendar, 201);
            } else {
                return redirect()->back()->with('success', 'Calendar created successfully');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        try {
            $calendar = DB::table('calendar')->where('id', $id)->first();
        } catch (\Exception $e) {
            if (request()->is('api/*')) {
                return response()->json(['error' => $e->getMessage()], 500);
            } else {
                return redirect()->back()->with('error', $e->getMessage());
            }
        } finally {
            if (request()->is('api/*')) {
                return response()->json($calendar, 200);
            } else {
                return $calendar;
            }
        }
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
        try {
            $calendar = Calendar::findOrFail($id);
            $calendar->delete();
        } catch (\Exception $e) {
            if (request()->is('api/*')) {
                return response()->json(['error' => $e->getMessage()], 500);
            } else {
                return redirect()->back()->with('error', $e->getMessage());
            }
        } finally {
            if (request()->is('api/*')) {
                $json = ['success' => 'Calendar deleted successfully'];
                return response()->json($json, 200);
            } else {
                return redirect()->back()->with('success', 'Calendar deleted successfully');
            }
        }
    }
}
