<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Administrador
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
        $confirmation = false;
        foreach (Auth::user()->permissions as $permission) {
            if($permission->name == "Admin"){
                $confirmation = true;
            }
        }
        if($confirmation){
            return $next($request);
        } 
        return redirect()->back();
        
    }
}
