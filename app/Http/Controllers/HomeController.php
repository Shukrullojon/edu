<?php

namespace App\Http\Controllers;

use App\Models\GroupSchedule;
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
    public function index(Request $request)
    {
        $schedules = GroupSchedule::select(DB::raw("count(id) as count"))
            ->where('date',$request->date ? date("Y-m-d", strtotime($request->date)) : date("Y-m-d"))
            ->groupBy(['group_id', 'teacher_id'])
            ->get();

        $students = GroupSchedule::select(DB::raw("count(id) as count"))
            ->where('date',$request->date ? date("Y-m-d", strtotime($request->date)) : date("Y-m-d"))
            ->groupBy(['group_id', 'teacher_id','student_id'])
            ->get();

        $teachers = GroupSchedule::select(DB::raw("count(id) as count"))
            ->where('date',$request->date ? date("Y-m-d", strtotime($request->date)) : date("Y-m-d"))
            ->groupBy(['teacher_id'])
            ->get();

        return view('home.index',[
            'schedules' => $schedules,
            'students' => $students,
            'teachers' => $teachers,
        ]);
    }

    public function profile()
    {
        return view('home.profile');
    }
}
