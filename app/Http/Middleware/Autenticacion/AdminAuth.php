<?php

namespace App\Http\Middleware\Autenticacion;

use Closure;

use Illuminate\Support\Facades\Auth;
use App\User;

class AdminAuth
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
        if(!(Auth::check())){    
            return redirect("/login");
        } else {
            $user = Auth::user();
            $admin = User::findByEmail($user->email);
            if($admin == null){
                return redirect("/");
            }
        }

        return $next($request);
    }

}
