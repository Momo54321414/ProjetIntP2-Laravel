<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prescriptions = DB::table('prescriptions')
            ->join('medications', 'prescriptions.medication_id', '=', 'medications.id')
            ->select('prescriptions.*', 'medications.name as medicationName')
            ->where('prescriptions.user_id', Auth::user()->id)
            ->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medications = Medication::all();

        return view('prescriptions.create', [
            'medications' => $medications,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $prescription = new Prescription();
        $prescription->nameOfPrescription = $request->nameOfPrescription;
        $prescription->dateOfPrescription = $request->dateOfPrescription;
        $prescription->dateOfStart = $request->dateOfStart;
        $prescription->durationOfPrescriptionInDays = $request->durationOfPrescriptionInDays;
        $prescription->frequencyBetweenDosesInHours = $request->frequencyBetweenDosesInHours;
        $prescription->frequencyPerDay = $request->frequencyPerDay;
        
        $prescription->user_id = Auth::user()->id;
        $prescription->medication_id = $request->medication_id;

        $medication->save();
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
