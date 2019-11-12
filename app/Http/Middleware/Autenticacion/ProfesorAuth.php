<?php

namespace App\Http\Middleware\Autenticacion;

use Closure;

use Illuminate\Support\Facades\Auth;
use App\Models\Profesor;

class ProfesorAuth
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
          if(!(Auth::guard('profesor')->check())){    
            return redirect("/login");
        } 
    
        
        return $next($request);
    }
}
