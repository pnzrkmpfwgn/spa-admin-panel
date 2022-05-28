<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Reservation;

class ReservationController extends Controller
{
    public function index(){
        $reservations = Reservation::orderBy('created_at','desc')->with(['user','likes'])->paginate(2); // Collection
        return view('reservations.index',[
            'reservations'=>$reservations
        ]);
    }
}
