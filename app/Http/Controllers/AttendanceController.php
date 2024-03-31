<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupScheduleStudent;
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
                'homework' => ($request->selected == 0 or $request->selected == -1) ? 0 : $data->homework,
                'ball' => ($request->selected == 0 or $request->selected == -1) ? 0 : $data->ball,
                'like' => ($request->selected == 0 or $request->selected == -1) ? 0 : $data->like,
            ]);
        }else if($request->name == 'homework'){
            $data->update([
                'homework' => $request->selected,
            ]);
        }else if($request->name == 'ball'){
            $data->update([
                'ball' => $request->selected,
            ]);
        }else if($request->name == 'like'){
            if ($request->selected == -1){
                $data->update([
                    'like' => -1,
                ]);
            }
            if ($data->attend == 1 and $data->homework == 1 and $data->ball == 1 and $request->selected == 1){
                $data->update([
                    'like' => $request->selected,
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
