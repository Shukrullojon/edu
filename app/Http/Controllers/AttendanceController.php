<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $groups = Group::whereIn('status',[1,2])->get()->pluck('name', 'id');
        $group = [];
        if ($request->group_id){
            $group = Group::where('id',$request->group_id)->first();
        }
        return view('attendance.index',[
            'groups' => $groups,
            'group' => $group,
        ]);
    }
}
