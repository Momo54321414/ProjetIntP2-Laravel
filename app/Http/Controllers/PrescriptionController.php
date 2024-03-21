<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrescriptionRequest;
use App\Http\Resources\PrescriptionsResource;
use App\Models\Medication;
use App\Models\Prescription;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{

    use HttpResponses;

    public function index()
    {

        if (request()->is('api/*')) {

            try {
                $prescriptions = Prescription::where('user_id', Auth::user()->id)->get();

                return $this->successResponse(['prescriptions' => $prescriptions], __('Prescription_Finding_Successfully'), 200);
            } catch (\Exception $e) {

                return $this->errorResponse(__('Prescription_Finding_Failed'), 500);
            }
        } else {

            try {
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
                        'prescriptions.id as id',
                        'prescriptions.user_id as user_id',
                        'prescriptions.firstIntakeHour as firstIntakeHour',
                        'prescriptions.frequencyOfIntakeInDays as frequencyOfIntakeInDays',
                        'prescriptions.created_at as created_at',
                        'prescriptions.updated_at as updated_at'

                    )
                    ->where('prescriptions.user_id', Auth::user()->id)
                    ->get();

                return  view('prescription.index', [
                    'prescriptions' => $prescriptions
                ]);
            } catch (\Exception $e) {
                $message = __('Prescription_Finding_Failed');

                return redirect()->back()->with('errors', $message);
            }
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
    public function store(PrescriptionRequest $request, string $locale)
    {

        $validated = $request->validated();
        $prescription = new Prescription($validated);
        $prescription->user_id = Auth::user()->id;


        try {
            $prescription->save();
            $message = __('Prescription_Created_Successfully');
            if (request()->is('api/*')) {

                return $this->successResponse(null, $message, 200);
            } else {
                return redirect()->route('prescriptions.index')->with('status', $message);
            }
        } catch (\Exception $e) {
            $message = __('Prescription_Creating_Failed');

            if (request()->is('api/*')) {

                return $this->errorResponse($message, 500);
            }
            return redirect()->back()->with('errors', $message);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $locale, string $id)
    {
        try {
            $prescription = Prescription::findOrFail($id);
            $medication = Medication::findOrFail($prescription->medication_id);
            if (request()->is('api/*')) {

                return $this->successResponse(['prescription' => $prescription, 'medication' => $medication], __('Prescription_Finding_Successfully'), 200);
            } else {

                return view('prescription.show', ['prescription' => $prescription, 'medication' => $medication]);
            }
        } catch (\Exception $e) {
            $message = __('Prescription_Finding_Failed');
            if (request()->is('api/*')) {
                return $this->errorResponse($message, 500);
            } else {
                return redirect()->back()->with('errors', $message);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $locale, string $id)
    {

        try {
            $prescription = Prescription::findOrFail($id);

            $medications = Medication::all();
            $maxDate = Carbon::now()->toDateString();
            $minDate = Carbon::now()->subDecades(2)->toDateString();
            $maxDateForStart = Carbon::now()->addDays(30)->toDateString();

            if (request()->is('api/*')) {
                return $this->successResponse([
                    'success' => __('Prescription_Edit_Successfully'),
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
            $message = __('Prescription_Edit_Failed');
            if (request()->is('api/*')) {
                return $this->errorResponse($message, 500);
            } else {
                return redirect()->back()->with('errors', $message);
            }
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PrescriptionRequest $request, string $locale, string $id)
    {


        $prescription = Prescription::findOrFail($id);

        try {
            $validated = $request->validated();
            $prescription->fill($validated);
            $prescription->user_id = Auth::user()->id;
            $prescription->saveOrFail();

            $message = __('Prescription_Updated_Successfully');
            if (request()->is('api/*')) {
                return $this->successResponse(null, $message, 200);
            } else {

                return redirect()->route('prescriptions.index')->with('status', $message);
            }
        } catch (\Exception $e) {
            $message = __('Prescription_Updating_Failed');
            if (request()->is('api/*')) {
                return $this->errorResponse($message, 500);
            } else {

                return redirect()->back()->with('errors', $message);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $locale, string $id)
    {
        $prescription = Prescription::findOrFail($id);

        try {

            $prescription->delete();
            $message = __('Prescription_Deleted_Successfully');
            if (request()->is('api/*')) {
                return $this->successResponse(null, $message, 200);
            } else {
                return redirect()->back()->with('status', $message);
            }
        } catch (\Exception $e) {
            $message = __('Prescription_Deleting_Failed');

            if (request()->is('api/*')) {
                return $this->errorResponse($message, 500);
            } else {
                return redirect()->back()->with('errors', $message);
            }
        }
    }
}
