<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('reservations.index');
    }

    public function store(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if(!auth()->attempt($request->only('email','password'))){
            return back()->with('status' ,'Invalid credentials');
        }

        return view('reservations.index');
    }
}
