<?php

namespace App\Http\Controllers;

use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DeviceController extends Controller
{
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
            return $this->successResponse(['devices' => $devices], __('Devices_Retrieved_Successfully'), 200);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        } catch (\Throwable $e) {
            return $this->errorResponse($e->getMessage(), 500);
        } catch (\Error $e) {
            return $this->errorResponse($e->getMessage(), 500);
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
    public function store(Request $request, string $locale)
    {
        try {
            $device = DB::table('devices')
                ->insert([
                    'name' => $request->name,
                    'user_id' => Auth::user()->id,
                    'device_id' => $request->device_id,
                    'device_type' => $request->device_type,
                    'device_token' => $request->device_token,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            return $this->successResponse(['device' => $device], __('Device_Created_Successfully'), 200);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        } catch (\Throwable $e) {
            return $this->errorResponse($e->getMessage(), 500);
        } catch (\Error $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
        
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
        try {
            $device = DB::table('devices')
                ->where('id', $id)
                ->where('user_id', Auth::user()->id)
                ->delete();
            return $this->successResponse(['device' => $device], __('Device_Deleted_Successfully'), 200);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        } catch (\Throwable $e) {
            return $this->errorResponse($e->getMessage(), 500);
        } catch (\Error $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }
}
