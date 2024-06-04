<?php

namespace App\Http\Controllers;

use App\Models\Day;
use Illuminate\Http\Request;

class DayController extends Controller
{
    public function index(Request $request)
    {
        $days = Day::filter($request->all())->latest()->paginate(20);
        return view('day.index',[
            'days' => $days
        ]);
    }
}
