<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    //
    public function show(){
        if (Auth::check()){
            return redirect('/app');
        }
        return view('auth.register');
    }

    public function register(RegisterRequest $request){
        $user = User::create($request->validated());

        return redirect('/login')->with('success', 'Su usuario fue creado exitosamente, diríjase al Inicio de Sesión');

    }
}
