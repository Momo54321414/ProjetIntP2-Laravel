<?php

namespace App\Http\Controllers;

use App\Models\Medication;
use App\Models\Prescription;
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
        if(request()->is('api/*'))
        {
            $prescriptions = DB::table('prescriptions')
                ->join('medications', 'prescriptions.medication_id', '=', 'medications.id')
                ->select('prescriptions.*', 'medications.name as medicationName')
                ->get();
            return response()->json($prescriptions);
        }
        else
        {
        $prescriptions = DB::table('prescriptions')
            ->join('medications', 'prescriptions.medication_id', '=', 'medications.id')
            ->select('prescriptions.*', 'medications.name as medicationName')
            ->where('prescriptions.user_id', Auth::user()->id)
            ->get();
        return  $prescriptions;
        }
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
        
        
        try {
            
            $prescription = new Prescription();
            $prescription->nameOfPrescription = $request->nameOfPrescription;
            $prescription->dateOfPrescription = $request->dateOfPrescription;
            $prescription->dateOfStart = $request->dateOfStart;
            $prescription->durationOfPrescriptionInDays = $request->durationOfPrescriptionInDays;
            $prescription->frequencyBetweenDosesInHours = $request->frequencyBetweenDosesInHours;
            $prescription->frequencyPerDay = $request->frequencyPerDay; 
            $prescription->user_id = Auth::user()->id;
            $prescription->medication_id = $request->medication_id;
            $prescription->saveOrFail();


        } catch (\Exception $e) {

            if (request()->is('api/*')) {

                return response()->json(['error' => 'Error creating prescription'], 500);
            }
            else {
                return redirect()->back()->with('errors', 'Error creating prescription');
            }

        }
        finally {
            
            if (request()->is('api/*')) {
                return response()->json(['success' => 'Prescription created successfully'], 200);
            }
            else {
                return redirect()->back()->with('status', 'Prescription created successfully');
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
        try{
            $prescription = Prescription::findOrFail($id);
            $prescription->delete();

        }
        catch (\Exception $e) {
            if (request()->is('api/*')) {
                return response()->json(['error' => 'Error deleting prescription'], 500);
            }
            else {
                return redirect()->back()->with('errors', 'Error deleting prescription');
            }
        }
        finally {
            if (request()->is('api/*')) {
                return response()->json(['success' => 'Prescription deleted successfully'], 200);
            }
            else {
                return redirect()->back()->with('status', 'Prescription deleted successfully');
            }
        }

    }
}
