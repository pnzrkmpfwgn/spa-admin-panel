<?php

namespace App\Http\Controllers;

use App\models\Booking;

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
        $reservations = Booking::orderBy('created_at','desc')->paginate(10); // Collection
        return view('reservations.index',[
            'reservations'=>$reservations
        ]);
    }
}
