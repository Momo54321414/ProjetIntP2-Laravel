<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeviceRequest;
use App\Models\Device;
use App\Traits\HandleRequestResponses;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DeviceController extends Controller
{
    use HandleRequestResponses;
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $devices = DB::table('devices')
                ->join('users', 'devices.user_id', '=', 'users.id')
                ->select('devices.*')
                ->where('devices.user_id', Auth::user()->id)
                ->get();
            return $this->handleSuccessResponseViewWEB_API(
                'devices.index',
                ['devices' => $devices],
                true,
                __('Devices_Retrieved_Successfully'),
                200
            );

        } catch (\Error $e) {
            return $this->handleErrorResponseRedirectWEB_API(__('Devices_Retrieved_Failed'), 500,'/');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('devices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeviceRequest $request, string $locale)
    {

        try {
            $validated = $request->validated();

            $device = Device::create([
                'noSerie' => $validated['noSerie'],
                'associatedPatientFullName' => $validated['associatedPatientFullName'],
                'user_id' => Auth::user()->id
            ]);
            return $this->handleSuccessResponseRedirectWEB_API(
                ['devices' => $device],
                __('Device_Created_Successfully'),
                200,
                'status',
                'devices.index'
            );
        } catch (\Error $e) {
            return $this->handleErrorResponseRedirectWEB_API(__('Devices_Created_Failed'), 500, 'devices.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $locale, string $id)
    {
        try {
            $device = DB::table('devices')
                ->where('id', $id)
                ->where('user_id', Auth::user()->id)
                ->first();
            return view('devices.show', ['device' => $device]);

        } catch (\Error $e) {
            return $this->handleErrorResponseRedirectWEB(__('Devices_Retrieved_Failed'), 'devices.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $locale, string $id)
    {
        try {
            $device = DB::table('devices')
                ->where('id', $id)
                ->where('user_id', Auth::user()->id)
                ->first();
            return view('devices.edit', ['device' => $device]);

        } catch (\Error $e) {
            return $this->handleErrorResponseRedirectWEB(__('Devices_Retrieved_Failed'), 'devices.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $locale, string $id)
    {
        try {
            $validated = $request->validate([
                'associatedPatientFullName' => 'required|string|max:255',
            ]);
            $device = DB::table('devices')
                ->where('id', $id)
                ->where('user_id', Auth::user()->id)
                ->update([
                    'associatedPatientFullName' => $validated['associatedPatientFullName'],
                ]);
 
            return $this->handleSuccessResponseRedirectWEB_API(
                null,
                __('Devices_Updated_Successfully'),
                200,
                'status',
                'devices.index'
            );
        } catch (\Error $e) {
            return $this->handleErrorResponseRedirectWEB_API(__('Devices_Updated_Failed'), 500, 'devices.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $locale, string $id)
    {
        try {

            $device = DB::table('devices')
                ->where('id', $id)
                ->where('user_id', Auth::user()->id)
                ->delete();

            if (!$device) {
                $this->handleErrorResponseRedirectWEB_API(__('Device_Not_Found'), 404, 'devices.index');
            }

            return $this->handleSuccessResponseRedirectWEB_API(
                null,
                __('Device_Deleted_Successfully'),
                200,
                'status',
                'devices.index'
            );
        } catch (\Error $e) {
            return $this->handleErrorResponseRedirectWEB_API(__('Device_Deleting_Failed'), 500, 'devices.index');
        }
    }
}
