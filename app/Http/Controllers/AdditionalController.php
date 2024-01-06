<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdditionalController extends Controller
{
    public function index(Request $request){
        return view('additional.index');
    }
}
