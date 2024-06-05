<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Group;
use App\Models\GroupSchedule;
use App\Models\GroupScheduleStudent;
use App\Models\GroupTeacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function edit($id)
    {
        $schedule = GroupSchedule::find($id);
        return view('attendance.edit',[
            'schedule' => $schedule,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = Validator::make($request->all(),[
            'status' => 'required|integer',
        ]);
        if ($validated->fails()){
            return back()->withInput()->withErrors($validated);
        }
        $request->request->remove('_method');
        $request->request->remove('_token');
        GroupSchedule::where('id',$id)->update($request->all());
        return redirect()->route('attend.noattend', [
            'date' => $request->date,
        ])->with('success','Attendance Edit Successfuly');
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
        $noattend = GroupSchedule::where('date',$request->date ? date("Y-m-d", strtotime($request->date)) : date("Y-m-d"))
            ->where('attend',0)
            ->latest()
            ->get();
        return view('attendance.noattend',[
            'noattend' => $noattend,
        ]);
    }
}
