<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Group;
use App\Models\GroupDetail;
use App\Models\GroupSchedule;
use App\Models\GroupScheduleStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $groupAll = Group::whereIn('status',[1,2])->get()->pluck('name', 'id');
        $days = Day::all();
        $groups = Group::latest();
        if (Auth::user()->hasRole('Teacher')){
            $group_list = GroupDetail::select('group_id as id')->where('teacher_id', Auth::user()->id)->get();
            if (!empty($group_list))
                $list = [];
                foreach ($group_list as $value){
                    $list[]=$value->id;
                }
                $groups = $groups->whereIn('id',$list);
        }

        if ($request->group_id){
            $groups = $groups->where('id',$request->group_id);
        }
        if ($request->day_id){
            $groups = $groups->where("type","LIKE","%{$request->day_id}%");
        }
        $groups = $groups->get();
        if (!Auth::user()->hasRole('Teacher')){
            $groups = [];
        }
        return view('attendance.index',[
            'groupAll' => $groupAll,
            'groups' => $groups,
            'days' => $days,
        ]);
    }

    public function optional_change(Request $request)
    {
        $data = GroupScheduleStudent::where('group_schedule_id',$request->schedule_id)
            ->where('student_id', $request->student_id)
            ->first();

        if ($data->schedule->status != 0){
            return response()->json([
                'status' => false,
                'message' => "Dars oldin yakullangan!",
            ]);
        }

        if (empty($data)){
            return response()->json([
                'status' => false,
                'message' => "Malumotlarni o'zgartirishda xatolik sodir bo'ldi.",
            ]);
        }
        if ($request->name == 'attendance'){
            $data->update([
                'attend' => $request->selected,
            ]);
            if ($request->selected == 0){
                $data->update([
                    'homework' => 0,
                    'ball' => 0,
                ]);
            }
        }else if($request->name == 'homework'){
            $data->update([
                'homework' => $request->selected,
            ]);
        }else if($request->name == 'ball'){
            $likes = GroupScheduleStudent::where('group_schedule_id',$request->schedule_id)
                ->where('ball',3)
                ->first();
            if ($request->selected == 3) {
                if ($data->attend == 2 and $data->homework == 2 and empty($likes)) {
                    $data->update([
                        'ball' => $request->selected,
                    ]);
                }
            }else{
                $data->update([
                    'ball' => $request->selected,
                ]);
            }
        }

        return response()->json([
            'status' => true,
            'schedule' => $data,
            'message' => "Malumot muvaffaqiyatli o'zgartirildi",
        ]);
    }
}
