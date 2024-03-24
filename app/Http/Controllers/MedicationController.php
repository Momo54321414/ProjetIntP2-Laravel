<?php

namespace App\Http\Controllers;

use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use App\Models\Medication;

class MedicationController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $medications = Medication::all();
            return $this->successResponse(['medications' => $medications], __('Medicatons_Retrieved_Successfully'), 200);
        } catch (\Exception $e) {
            return $this->errorResponse(__('Medicatons_Retrieved_Failed'), 500);
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
        // $medication = new Medication();
        // $medication->name = $request->name;
        // $medication->function = $request->function;
        // $medication->canBeInPillBox = $request->canBeInPillBox;

        // $medication->save();
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
