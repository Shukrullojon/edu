<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Group;
use App\Models\GroupSchedule;
use App\Models\GroupScheduleStudent;
use App\Models\GroupTeacher;
use App\Models\User;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $groups = GroupTeacher::where('teacher_id', auth()->user()->id)->latest()->get();
        $days = Day::get();
        $schedules = GroupSchedule::where('teacher_id', auth()->user()->id);
        if ($request->group_id){
            $schedules = $schedules->where('group_id',$request->group_id);
        }
        if ($request->day_id){
            $schedules = $schedules->where('day_id',$request->day_id);
        }
        $schedules = $schedules->groupBy(['group_id','teacher_id'])->get();
        $datas = [];
        foreach ($schedules as $schedule){
            $sub_data = [
                'group' => [
                    'id' => $schedule->group_id,
                    'name' =>$schedule->group->name ?? '',
                    'cource' => $schedule->group->cource->name ?? '',
                    'day' => $schedule->day->name ?? '',
                    'time' => date("H:i", strtotime($schedule->begin_time))."-".date("H:i", strtotime($schedule->end_time)),
                    'lang' => $schedule->group->lang->name ?? '',
                    'direction' => $schedule->direction->name ?? ''
                ],
                'days' => [],
                'students' => [],
            ];
            foreach ($schedule->days as $d){
                $students = GroupSchedule::where('group_id',$schedule->group_id)
                    ->where('teacher_id',auth()->user()->id)
                    ->where('date',$d->date)
                    ->orderByDesc('student_id')
                    ->get();
                $std = [];
                foreach ($students as $s){
                    $std[$s->student_id] = [
                        'date' => $s->date,
                        'schedule_id' => $s->id,
                        'attendance' => $s->attend,
                        'homework' => $s->homework,
                        'ball' => $s->ball,
                    ];
                }
                $sub_data['days'][$d->date] = [
                    'teacher' => $d->teacher->name,
                    'students' => $std,
                ];
            }
            foreach ($schedule->students as $stu){
                $uStd = User::find($stu->student_id);
                $sub_data['students'][] = [
                    'id' => $stu->student_id,
                    'name' => $uStd->name ?? '',
                    'surname' => $uStd->surname ?? '',
                    'age' => 30,
                ];
            }
            $datas[]=$sub_data;
        }
        return view('attendance.index',[
            'schedules' => $schedules,
            'datas' => $datas,
            'groups' => $groups,
            'days' => $days,
        ]);
    }

    public function attendanceChange(Request $request)
    {
        $schedule = GroupSchedule::find($request->schedule_id);
        if (empty($schedule)){
            return response()->json([
                'status' => false,
                'message' => "Malumotlarni o'zgartirishda xatolik sodir bo'ldi.",
            ]);
        }

        if ($request->name == 'attendance'){
            $schedule->update([
                'attend' => $request->selected,
            ]);
            if ($request->selected == 0){
                $schedule->update([
                    'homework' => 0,
                    'ball' => 0,
                ]);
            }
        }else if($request->name == 'homework'){
            $schedule->update([
                'homework' => $request->selected,
            ]);
        }else if($request->name == 'ball'){
            $likes = GroupSchedule::where('group_id',$schedule->group_id)
                ->where('teacher_id',$schedule->teacher_id)
                ->where('date',$schedule->date)
                ->where('ball',3)
                ->first();
            if ($request->selected == 3) {
                if ($schedule->attend == 2 and $schedule->homework == 2 and empty($likes)) {
                    $schedule->update([
                        'ball' => $request->selected,
                    ]);
                }
            }else{
                $schedule->update([
                    'ball' => $request->selected,
                ]);
            }
        }

        return response()->json([
            'status' => true,
            'schedule' => $schedule->toArray(),
            'message' => "Malumot muvaffaqiyatli o'zgartirildi",
        ]);
    }

    public function noattend(Request $request)
    {
        // Bugun qaysi gruhlarga dars bo'lishi kerak edi
        // Nechta student kelishi kerak edi
        // Nechta kelmadi
        // Kelmaganlar ro'yhati
        $schedules = new GroupSchedule();
        $schedules = $schedules->where('date',$request->date ? date("Y-m-d", strtotime($request->date)) : date("Y-m-d"));
        $schedules = $schedules->latest()->groupBy('group_id')->get();
        $groups = [];
        foreach ($schedules as $schedule){
            $info = [
                'name' => $schedule->group->name,
                'date' => $schedule->date,
                'students' => 0,
                'noattend' => 0,
            ];
            $groups[]=$info;
        }
        $noattend = GroupSchedule::where('date',$request->date ? date("Y-m-d", strtotime($request->date)) : date("Y-m-d"))->latest()->groupBy('group_id')->get();
        return view('attendance.noattend',[
            'groups' => $groups,
            'noattend' => $noattend,
        ]);
    }
}
