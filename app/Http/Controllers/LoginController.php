<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    //

    public function register(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed|max:6'


        ]);


        //no usamos asignacion masiva debido a que el metodo create no permite modificar los datos, por eso usamos el metodo manual
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);//hasheamos el password

        $user->save();


        Auth::login($user);

        return redirect()->route('login');

    }


    public function login(Request $request){

        $credencial = [

            'email' => $request->email,
            'password' => $request->password


        ];

        $remember = $request->has('remember');


        if(Auth::attempt($credencial, $remember)){

           $request->session()->regenerate();//generamos la sesion y el token de usuario

            return redirect()->intended('/inventario');

        }else{

            return back()->withErrors([

                'email' => 'Las credenciales son incorrectas'


            ])->onlyInput('email');




        }
        
        



    }


    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');


    }

}
