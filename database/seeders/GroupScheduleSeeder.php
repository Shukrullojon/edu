<?php

namespace Database\Seeders;

use App\Models\Day;
use App\Models\GroupSchedule;
use App\Models\GroupStudent;
use App\Models\GroupTeacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $group_teachers = GroupTeacher::get();
        foreach ($group_teachers as $group_teacher){
            $start_date = date('Y-m-d', strtotime('-2 weeks'));
            $end_date = date('Y-m-d', strtotime($start_date." + ".$group_teacher->group->cource->during." months"));
            $daysDB = Day::select('list')->where('id',$group_teacher->group->day_id)->get()->toArray();
            $days = [];
            foreach ($daysDB as $d){
                $days = array_merge($days, json_decode($d['list'],true));
            }
            $diff = (int)(strtotime($end_date) - strtotime($start_date)) / (60 * 60 * 24);
            $group_students = GroupStudent::where('group_id',$group_teacher->group_id)->get();
            for($i = 0; $i < $diff; $i++){
                foreach ($group_students as $group_student){
                    $dd = date("D", strtotime("$start_date + $i days"));
                    if (in_array($dd, $days)){
                        GroupSchedule::create([
                            'group_id' => $group_teacher->group_id,
                            'teacher_id' => $group_teacher->teacher_id,
                            'date' => date("Y-m-d", strtotime("$start_date + $i days")),
                            'begin_time' => $group_teacher->begin_time,
                            'end_time' => $group_teacher->end_time,
                            'room_id' => $group_teacher->room_id,
                            'direction_id' => $group_teacher->direction_id,
                            'day_id' => $group_teacher->day_id,
                            'student_id' => $group_student->student_id,
                            'attend' => 2,
                            'homework' => 2,
                            'ball' => 0,
                        ]);
                    }
                }
            }
        }
        /*for ($i=0;$i < 100000; $i++){
            GroupSchedule::create([
                'group_id' => 1,
                'teacher_id' => 1,
                'date' => "2024-07-08",
                'begin_time' => "18:00:00",
                'end_time' => "19:00:00",
                'room_id' => 1,
                'direction_id' => 1,
                'day_id' => 1,
                'student_id' => 1,
                'attend' => 2,
                'homework' => 2,
                'ball' => 0,
            ]);
        }*/
    }
}
