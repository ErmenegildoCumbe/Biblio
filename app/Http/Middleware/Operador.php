<?php

namespace App\Http\Middleware;

use Closure;

class Operador
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
            if($permission->name == "Operador"){
                $confirmation = true;
            }
        }
        if($confirmation){
            return $next($request);
        } 
        return redirect()->back();       
    }
}
