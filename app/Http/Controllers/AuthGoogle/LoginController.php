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
            
        } else if($profesor!=null){
            $credentials = [
                'password'=>'1234',
                'gmail'=> $profesor->gmail,
                'email'=>$profesor->gmail,
            ];
           
           Auth::guard('profesor')->login($profesor);
        
        }
        else if ($alumno != null){
            Auth::login($alumno);
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
