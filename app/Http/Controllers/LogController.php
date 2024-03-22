<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Log;
use App\Traits\HttpResponses;


class LogController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index(string $locale)
    {
        if(request()->is('api/*'))
        {
            try {
                $logs = DB::table('logs')
                ->join('device', 'logs.device_id', '=', 'device.id')
                ->select('logs.*', 'device.noSerie as deviceNoSerie')
                ->where('device.user_id', auth()->user()->id)
                ->get();
                return $this->successResponse(["logs"=>$logs],__('Logs_Retrieved_Successfully'),200);
            } catch (\Exception $e) {
                return $this->errorResponse(__('Logs_Retrieved_Failed'), 500);
            }
            
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
