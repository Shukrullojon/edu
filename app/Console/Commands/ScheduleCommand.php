<?php

namespace App\Console\Commands;

use App\Models\GroupSchedule;
use App\Models\GroupScheduleStudent;
use App\Models\GroupStudent;
use Illuminate\Console\Command;

// role
// vazifa
// maqsad

// instagramni suniy intelektga o'qitib, reklana web sayt.

class ScheduleCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule {arg}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $method = $this->argument('arg');
        if (method_exists($this, $method)) {
            $this->$method();
        }
        return 0;
    }

    public function group()
    {
        $schedules = GroupSchedule::get();
        foreach ($schedules as $schedule){
            $students = GroupStudent::where('group_id',$schedule->group_id)->get();
            foreach ($students as $student){
                $attend = $student->status ? 2 : -1;
                $homework = $attend == 2 ? 2 : 0;
                GroupScheduleStudent::firstOrCreate(
                    [
                        'group_schedule_id' => $schedule->id,
                        'student_id' => $student->student_id,
                    ],
                    [
                        'attend' => $attend,
                        'homework' => $homework,
                        'ball' => 0,
                        'atr' => 0,
                    ]
                );
            }
        }
    }
    /*
     * attend 1, 0.5, 0, -1
     * homework 1, 0.5, 1.5, 0
     * ball 0, 0.5, 1
     * like 0, 1, -1
    */
}
