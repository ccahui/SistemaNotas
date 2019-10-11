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
    
    public function callback(){

        $userGoogle = Socialite::driver('google')->user();
        
        $admin = User::findByEmail($userGoogle->email);
        $profesor = Profesor::findByEmail($userGoogle->email);
        $alumno = Alumno::findByEmail($userGoogle->email);

        /*TODO */
        if($admin!= null ){    
            Auth::login($admin);
            return redirect("/alumnos");
        } else if($profesor!=null){
            return redirect("/notas/profesor/1");
        }
        else if ($alumno != null){
            Auth::login($alumno);
            return redirect("/notas/alumno/1");
        } 
        
        return redirect("/");
    }

    public function logout(){
        if(Auth::check()){
            Auth::logout();
        }
        
        return redirect("/");
    }
}
