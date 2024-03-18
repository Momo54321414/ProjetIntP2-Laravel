<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrescriptionRequest;
use App\Models\Medication;
use App\Models\Prescription;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Traits\HttpResponses;

class PrescriptionController extends Controller
{

    use HttpResponses;
    //Gestion des messages d'erreurs selon la localisation à faire
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prescriptions = DB::table('prescriptions')
            ->join('medications', 'prescriptions.medication_id', '=', 'medications.id')
            ->select(
                'medications.id as medicationId',
                'medications.name as medicationName',
                'medications.function as medicationFunction',
                'medications.canBeInPillBox as medicationcanBeInPillBox',
                'prescriptions.nameOfPrescription as nameOfPrescription',
                'prescriptions.dateOfPrescription as dateOfPrescription',
                'prescriptions.dateOfStart as dateOfStart',
                'prescriptions.durationOfPrescriptionInDays as durationOfPrescriptionInDays',
                'prescriptions.frequencyBetweenDosesInHours as frequencyBetweenDosesInHours',
                'prescriptions.frequencyPerDay  as frequencyPerDay',
                'prescriptions.id as id'
            )
            ->where('prescriptions.user_id', Auth::user()->id)
            ->get();

        if (request()->is('api/*')) {

            return $this->successResponse($prescriptions, 'Prescriptions found successfully', 200);
        } else {
            return  view('prescription.index', [
                'prescriptions' => $prescriptions
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

        if (request()->is('api/*')) {
            return $this->successResponse([
                'medications' => $medications,
                'maxDate' => $maxDate,
                'minDate' => $minDate,
                'maxDateForStart' => $maxDateForStart
            ], 'Prescriptions found successfully', 200);
        }

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
    public function store(PrescriptionRequest $request, string $locale)
    {
        $Messages =  $this->getRightMessagesForCreate($locale);
        $validated = $request->validated();
        $prescription = new Prescription($validated);
        $prescription->user_id = Auth::user()->id;


        try {
            $prescription->save();

            if (request()->is('api/*')) {

                return response()->json(['success' => $Messages['success']], 200);
            } else {
                return redirect()->route('prescriptions.index')->with('status', $Messages['success']);
            }
        } catch (\Exception $e) {

            if (request()->is('api/*')) {

                return response()->json(['error' => $Messages['error']], 500);
            }
            return redirect()->back()->withErrors('errors');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $locale, string $id)
    {
        try {
            $prescription = Prescription::findOrFail($id);
            $medications = Medication::findOrFail($prescription->medication_id);
            if (request()->is('api/*')) {
                return $this->successResponse(['prescription' => $prescription, 'medications' => $medications], 'Prescription found successfully', 200);
            } else {
                return view('prescription.show', ['prescription' => $prescription, 'medications' => $medications]);
            }
        } catch (\Exception $e) {
            if (request()->is('api/*')) {
                return $this->errorResponse('Error finding prescription', 500);
            } else {
                return redirect()->back()->with('errors', 'Error finding prescription');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $locale, string $id)
    {
        $locale = app()->getLocale();
        $Messages =  $this->getRightMessagesForEdit($locale);
        try {
            $prescription = Prescription::findOrFail($id);

            $medications = Medication::all();
            $maxDate = Carbon::now()->toDateString();
            $minDate = Carbon::now()->subDecades(2)->toDateString();
            $maxDateForStart = Carbon::now()->addDays(30)->toDateString();

            if (request()->is('api/*')) {
                return $this->successResponse([
                    'success' => $Messages['success'],
                    $prescription,
                    $medications,
                    $maxDate,
                    $minDate,
                    $maxDateForStart
                ], 200);
            } else {
                //dd($prescription, $medications, $maxDate, $minDate, $maxDateForStart);
                return view('prescription.edit', [
                    'prescription' => $prescription,
                    'medications' => $medications,
                    'maxDate' => $maxDate,
                    'minDate' => $minDate,
                    'maxDateForStart' => $maxDateForStart,
                ]);
            }
        } catch (\Exception $e) {
            if (request()->is('api/*')) {
                return $this->errorResponse(['error' => 'Error editing prescription'], 500);
            } else {
                return redirect()->back()->with('errors', 'Error editing prescription');
            }
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PrescriptionRequest $request, string $locale, string $id)
    {
        $Messages =  $this->getRightMessagesForUpdate($locale);
        $prescription = Prescription::findOrFail($id);

        try {
            $validated = $request->validated();
            $prescription->fill($validated);
            $prescription->user_id = Auth::user()->id;
            $prescription->saveOrFail();

            if (request()->is('api/*')) {
                return response()->json(['success' => $Messages['success']], 200);
            } else {

                return redirect()->route('prescriptions.index')->with('status', $Messages['success']);
            }
        } catch (\Exception $e) {
            if (request()->is('api/*')) {
                return response()->json(['error' => $Messages['error']], 500);
            } else {

                return redirect()->back()->with('errors', $Messages['error']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $locale, string $id)
    {
        $Messages =  $this->getRightMessagesForDelete($locale);
        try {
            $prescription = Prescription::findOrFail($id);
            $prescription->delete();
            if (request()->is('api/*')) {
                return $this->successResponse(['success' => $Messages['success']], 200);
            } else {
                return redirect()->back()->with('status', $Messages['success']);
            }
        } catch (\Exception $e) {
            if (request()->is('api/*')) {
                return $this->errorResponse(['error' => $Messages], 500);
            } else {
                return redirect()->back()->with('errors', $Messages['error']);
            }
        }
    }


    public function getRightMessagesForCreate(string $locale)
    {
        $Messages = [];
        switch ($locale) {
            case 'en':
                $Messages = [
                    'error' => 'Error finding prescription',
                    'success' => 'Prescription found successfully',
                ];

                break;
            case 'fr':
                $Messages = [
                    'error' => 'Erreur lors de la recherche de la prescription',
                    'success' => 'Prescription à été trouvée avec succès',
                ];
                break;
            default:
                $Messages = [
                    'error' => 'Error finding prescription',
                    'success' => 'Prescription found successfully',
                ];
                break;
        }
        return $Messages;
    }
    public function getRightMessagesForEdit(string $locale)
    {
        $Messages = [];
        switch ($locale) {
            case 'en':
                $Messages = [
                    'error' => 'Error editing prescription',
                    'success' => 'Prescription edited successfully',
                ];

                break;
            case 'fr':
                $Messages = [
                    'error' => 'Erreur lors de la modification de la prescription',
                    'success' => 'Prescription modifiée avec succès',
                ];
                break;
            default:
                $Messages = [
                    'error' => 'Error editing prescription',
                    'success' => 'Prescription edited successfully',
                ];
                break;
        }
        return $Messages;
    }


    public function getRightMessagesForUpdate(string $locale)
    {
        $Messages = [];
        switch ($locale) {
            case 'en':
                $Messages = [
                    'error' => 'Error updating prescription',
                    'success' => 'Prescription updated successfully',
                ];

                break;
            case 'fr':
                $Messages = [
                    'error' => 'Erreur lors de la mise à jour de la prescription',
                    'success' => 'Prescription mise à jour avec succès',
                ];
                break;
            default:
                $Messages = [
                    'error' => 'Error updating prescription',
                    'success' => 'Prescription updated successfully',
                ];
                break;
        }
        return $Messages;
    }

    public function getRightMessagesForDelete(string $locale)
    {
        $Messages = [];
        switch ($locale) {
            case 'en':
                $Messages = [
                    'error' => 'Error deleting prescription',
                    'success' => 'Prescription deleted successfully',
                ];

                break;
            case 'fr':
                $Messages = [
                    'error' => 'Erreur lors de la suppression de la prescription',
                    'success' => 'Prescription supprimée avec succès',
                ];
                break;
            default:
                $Messages = [
                    'error' => 'Error deleting prescription',
                    'success' => 'Prescription deleted successfully',
                ];
                break;
        }
        return $Messages;
    }
}
