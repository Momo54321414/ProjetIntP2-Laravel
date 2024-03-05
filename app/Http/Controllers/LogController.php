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
        return  $logs;
        }
        return view('logs.index', [
            'logs' => $logs,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

}
