<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $email=$request->get('email');
        $password=$request->get('password');
        
        // dd($password);

        if (Auth::attempt(['email' => $email, 'password' => $password, 'active' => 1])) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        // return redirect(RouteServiceProvider::HOME);
        // return redirect('/dashboard');
        return back()->withErrors([
            'email' => 'Tu usuario no esta habilitado, contactese con soporte',
        ]);
    }

}
