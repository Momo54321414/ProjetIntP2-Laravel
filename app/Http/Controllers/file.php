<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeviceRequest;
use App\Models\Device;
use Illuminate\Auth\Events\Failed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $locale)
    {
        if(request()->is('api/*'))
        {
            $devices = DB::table('device')
                ->join('user', 'device.user_id', '=', 'user.id')
                ->select('device.*', 'user.name as userName')
                ->get();
            return response()->json($device);
        }
        else
        {
        $devices = DB::table('device')
            ->join('user', 'device.user_id', '=', 'user.id')
            ->select('device.*', 'user.name as userName')
            ->get();
        return  $devices;
        }
        return view('device.index', [
            'devices' => $devices,
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('device.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $locale)
    {
        
        try {
            $device = new Device();
            $device->noSerie = $request->noSerie;
            $device->user_id = Auth::user()->id;
            $device->associatedPatientFullName = $request->associatedPatientFullName;
 
            $device->save();
        }
        catch (\Exception $e) {
            if (request()->is('api/*')) {
                return response()->json(['error' => 'Error creating device'], 500);
            }
            else {
                return redirect()->back()->with('errors', 'Error creating device');
            }
        }
        finally {
            if (request()->is('api/*')) {
                return response()->json(['success' => 'Device created successfully'], 200);
            }
            else {
                return redirect()->route('profile.edit')->with('status', 'Device created successfully');
            }
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $locale, string $id)
    {
        dd($id);
        try{
            $device = Device::findOrFail($id);
            $device->delete();

        }
        catch (\Exception $e) {
            if (request()->is('api/*')) {
                return response()->json(['error' => 'Error deleting device'], 500);
            }
            else {
                return redirect()->back()->with('errors', 'Error deleting device');
            }
        }
        finally {
            if (request()->is('api/*')) {
                return response()->json(['success' => 'Device deleted successfully'], 200);
            }
            else {
                return redirect()->back()->with('status', 'Device deleted successfully');
            }
        }
    }
}
