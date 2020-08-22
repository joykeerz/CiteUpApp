<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ceklevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if((!Auth::guest()) && (Auth::user()->role=='admin')){
        /*return $next($request);*/
        return view('pengurus/PanelPengurus');
        }else{
        return view('peserta/PanelPeserta');
        }
    }
}
