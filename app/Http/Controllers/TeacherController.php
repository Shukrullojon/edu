<?php

namespace App\Http\Controllers;

use App\Models\GroupDetail;
use App\Models\Sms;
use App\Models\UserAttend;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function schedule()
    {
        $schedules = GroupDetail::where('teacher_id', auth()->user()->id)
            ->where('status', 1)
            ->get();
        return view('teacher.schedule', [
            'schedules' => $schedules,
        ]);
    }

    public function scheduleedit($id)
    {
        $schedule = GroupDetail::find($id);
        if ($schedule->teacher_id != auth()->user()->id){
            return back()->with('error',"Bu guruh ma'lumotlarini o'zgartira olmaysiz!!!");
        }
        $attends = UserAttend::where('group_id', $schedule->group_id)->where('date', date('Y-m-d'))->get();
        return view('teacher.edit', [
            'schedule' => $schedule,
            'attends' => $attends,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->request->remove('_token');
        $request->request->remove('_method');
        $groupDetail = GroupDetail::find($id);
        if ($groupDetail->teacher_id != auth()->user()->id){
            return back()->with("error","Siz boshqa gruhni ma'lumotlarini ozgartirishga urinyapsiz!!!");
        }

        if (date('H') >= date('H', strtotime($groupDetail->begin_time)) and strtotime($groupDetail->begin_time) > strtotime("-5 minutes")){
            foreach ($request->all() as $key => $value) {
                if (is_array($value)){
                    $uatend = UserAttend::updateOrCreate(
                        [
                            'teacher_id' => auth()->user()->id,
                            'group_id' => $groupDetail->group_id,
                            'student_id' => $key,
                            'date' => date('Y-m-d'),
                        ],
                        [
                            'attend' => $value['attend'],
                        ]
                    );
                    if ($value['attend'] == 0 or $value['attend'] == 1){
                        $tx = $value['attend'] == 0 ? 'kelmadi.' : 'kech qolib keldi.';
                        $text = "Farzandingiz ".$uatend->student->name." ".$uatend->student->surname." bugun, ".date('H:i', strtotime($groupDetail->begin_time)).' da, '.$uatend->group->name.' darsiga '.$tx;
                        Sms::where('user_id',$uatend->student_id)->where('status',0)->where('created_at','LIKE','%'.date('Y-m-d'.'%'))->delete();
                        Sms::create([
                            'user_id' => $uatend->student_id,
                            'phone' => '+998'.$uatend->student->parent_phone ?? '',
                            'type' => ($value['attend'] == 0) ? 7 : 8,
                            'text' => $text,
                            'sms' => 0,
                        ]);
                    }else if($value['attend'] == 2){
                        Sms::where('user_id',$uatend->student_id)->where('status',0)->where('created_at','LIKE','%'.date('Y-m-d'.'%'))->delete();
                    }
                }
            }
        }

        if (!empty($request->like) and strtotime($groupDetail->end_time) > strtotime("-3 minutes")) {
            UserAttend::where('teacher_id', auth()->user()->id)->where('group_id', $groupDetail->group_id)->update([
                'like' => 0
            ]);
            UserAttend::where('student_id', $request->like)
                ->where('teacher_id', auth()->user()->id)
                ->where('group_id', $groupDetail->group_id)
                ->update([
                    'like' => 1
                ]);
        }
        return redirect()->route('teacherScheduleEdit', $id)->with('success', 'Schedule updated successfully');
    }
}
