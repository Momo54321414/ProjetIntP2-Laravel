<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrescriptionRequest;
use App\Models\Medication;
use App\Models\Prescription;
use Carbon\Carbon;
use Illuminate\Auth\Events\Failed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PrescriptionController extends Controller
{

    //Gestion des messages d'erreurs selon la localisation à faire
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->is('api/*')) {

            $prescriptions = DB::table('prescriptions')
                ->join('medications', 'prescriptions.medication_id', '=', 'medications.id')
                ->select('prescriptions.*', 'medications.name as medicationName')
                ->get();
            return response()->json($prescriptions);
        } else {
            $prescriptions = DB::table('prescriptions')
                ->join('medications', 'prescriptions.medication_id', '=', 'medications.id')
                ->select(
                    'medications.id as medicationId',
                    'medications.name as medicationName',
                    'medications.function as medicationFunction',
                    'medications.isInPillBox as medicationIsInPillBox',
                    'prescriptions.nameOfPrescription as nameOfPrescription',
                    'prescriptions.dateOfPrescription as dateOfPrescription',
                    'prescriptions.dateOfStart as dateOfStart',
                    'prescriptions.durationOfPrescriptionInDays as durationOfPrescriptionInDays',
                    'prescriptions.frequencyBetweenDosesInHours as frequencyBetweenDosesInHours',
                    'prescriptions.frequencyPerDay  as frequencyPerDay',
                    'prescriptions.id as prescriptionId'
                )
                ->where('prescriptions.user_id', Auth::user()->id)
                ->get();

            $medications = DB::table('medications')
                ->select('medications.*')
                ->get();
            $maxDate = Carbon::now()->toDateString();
            $minDate = Carbon::now()->subDecades(2)->toDateString();
            $maxDateForStart = Carbon::now()->addDays(30)->toDateString();

            return  view('prescription.index', [
                'prescriptions' => $prescriptions, 'medications' => $medications,
                'maxDate' => $maxDate,
                'minDate' => $minDate,
                'maxDateForStart' => $maxDateForStart,
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medications = Medication::all();
        $maxDate = Carbon::now()->toDateString();
        $minDate = Carbon::now()->subDecades(2)->toDateString();
        $maxDateForStart = Carbon::now()->addDays(30)->toDateString();


        return view('prescription.create', [
            'medications' => $medications,
            'maxDate' => $maxDate,
            'minDate' => $minDate,
            'maxDateForStart' => $maxDateForStart,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PrescriptionRequest $request)
    {

        $validated = $request->validated();

        $prescription = new Prescription($validated);
        $prescription->user_id = Auth::user()->id;


        try {
            $prescription->save();
        } catch (\Exception $e) {

            if (request()->is('api/*')) {

                return response()->json(['error' => 'Error creating prescription'], 500);
            } else {
                return redirect()->back()->with('errors', 'Error creating prescription');
            }
        } finally {

            if (request()->is('api/*')) {
                return response()->json(['success' => 'Prescription created successfully'], 200);
            } else {
                return redirect()->route('profile.edit')->with('status', 'Prescription created successfully');
            }
        }
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
        try {
            $prescription = Prescription::findOrFail($id);
            $medications = Medication::all();
            $maxDate = Carbon::now()->toDateString();
            $minDate = Carbon::now()->subDecades(2)->toDateString();
            $maxDateForStart = Carbon::now()->addDays(30)->toDateString();
        } catch (\Exception $e) {
            if (request()->is('api/*')) {
                return response()->json(['error' => 'Error editing prescription'], 500);
            } else {
                return redirect()->back()->with('errors', 'Error editing prescription');
            }
        } finally {
            if (request()->is('api/*')) {
                return response()->json(['success' => 'Prescription edited successfully'], 200);
            } else {
                return view('prescription.edit', [
                    'prescription' => $prescription,
                    'medications' => $medications,
                    'maxDate' => $maxDate,
                    'minDate' => $minDate,
                    'maxDateForStart' => $maxDateForStart,
                ]);
            }
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PrescriptionRequest $request, string $id)
    {

        try {

            $prescription = Prescription::findOrFail($id);
            $validated = $request->validated();
            $prescription->fill($validated);
            $prescription->user_id = Auth::user()->id;
            $prescription->saveOrFail();
        } catch (\Exception $e) {
            if (request()->is('api/*')) {
                return response()->json(['error' => 'Error updating prescription'], 500);
            } else {
                return redirect()->back()->with('errors', 'Error updating prescription');
            }
        } finally {
            if (request()->is('api/*')) {
                return response()->json(['success' => 'Prescription updated successfully'], 200);
            } else {
                return redirect()->back()->with('status', 'Prescription updated successfully');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $prescription = Prescription::findOrFail($id);
            $prescription->delete();
        } catch (\Exception $e) {
            if (request()->is('api/*')) {
                return response()->json(['error' => 'Error deleting prescription'], 500);
            } else {
                return redirect()->back()->with('errors', 'Error deleting prescription');
            }
        } finally {
            if (request()->is('api/*')) {
                return response()->json(['success' => 'Prescription deleted successfully'], 200);
            } else {
                return redirect()->back()->with('status', 'Prescription deleted successfully');
            }
        }
    }
}
