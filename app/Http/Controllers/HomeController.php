<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Room;
use App\Models\UserPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $grCount = Group::count();
        $rooms = Room::where('status',1)->get();
        $pay = UserPayment::select(DB::raw("COUNT(id) numb"),DB::raw("SUM(amount) as amount"), DB::raw("SUM(pay_amount) as pay_amount"))
            ->where('status',0)
            ->first();
        $payC = UserPayment::select(DB::raw("COUNT(id) numb"))
            ->where('month',date('Ym'))
            ->where('status',1)
            ->first();
        return view('home',[
            'rooms' => $rooms,
            'grCount' => $grCount,
            'pay' => $pay,
            'payC' => $payC,
        ]);
    }

    public function finance(Request $request){

    }
}
