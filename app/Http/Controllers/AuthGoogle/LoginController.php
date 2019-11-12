<?php

namespace App\Http\Controllers\AuthGoogle;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Models\Alumno;
use App\Models\Profesor;
use Illuminate\Support\Facades\Auth;
use Socialite;

class LoginController extends Controller
{
    public function login(){
        return Socialite::driver('google')->redirect();
    }
    
    public function callback(Request $request){

        $tipo = $request->query('type');

        $userGoogle = Socialite::driver('google')->user();
        
        $admin = User::findByEmail($userGoogle->email);
        $profesor = Profesor::findByEmail($userGoogle->email);
        $alumno = Alumno::findByEmail($userGoogle->email);
        
        /*TODO */
        if($admin!= null ){    
            Auth::login($admin); 
        }
        if($profesor!=null){
          
           Auth::guard('profesor')->login($profesor);
        
        }
       if ($alumno != null){
            Auth::guard('alumno')->login($alumno);
        }
        return redirect("/");
    }

    public function logout(){
        if(Auth::check()){
            Auth::logout();
        }
        if(Auth::guard('profesor')->check()){
            Auth::guard('profesor')->logout();
        }
        
        if(Auth::guard('alumno')->check()){
            Auth::guard('alumno')->logout();
        }
        
        
        return redirect("/");
    }
}
