<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $locale)
    {
        if(request()->is('api/*'))
        {
            $logs = DB::table('logs')
                ->join('device', 'logs.device_id', '=', 'device.id')
                ->select('logs.*', 'device.noSerie as deviceNoSerie')
                ->get();
            return response()->json($logs);
        }
        else
        {
            $logs = DB::table('logs')
            ->join('device', 'logs.device_id', '=', 'device.id')
            ->select('logs.*', 'device.noSerie as deviceNoSerie')
            ->get();
            return view('logs.index', [
                'logs' => $logs,
            ]);
        }
   
    }


    public function store(Request $request, string $locale)
    {
        
        try {
            $log = new Log();
            $log->device_id = $request->device_id;
            $log->action = $request->action;
            $log->actionTimestamp = $request->actionTimestamp;

            $log->save();
        }
        catch (\Exception $e) {
            if (request()->is('api/*')) {
                return response()->json(['error' => 'Error creating log'], 500);
            }
            else {
                return redirect()->back()->with('errors', 'Error creating log');
            }
        }
        finally {
            if (request()->is('api/*')) {
                return response()->json(['success' => 'Log created successfully'], 200);
            }
            else {
                return redirect()->route('profile.edit')->with('status', 'Log created successfully');
            }
        }
    }

}
