<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\URL;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        //app()->setLocale($request->segment(1));

        $locale = $request->route('locale') ?? app()->getLocale();
        app()->setLocale($locale);
 
        URL::defaults(['locale' => $request->segment(1)]);
 
        return $next($request);
    }
}
