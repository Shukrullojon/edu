<?php

namespace App\Console\Commands;

use App\Models\GroupStudent;
use App\Models\UserPayment;
use Illuminate\Console\Command;

class StudentCommand extends Command
{
    protected $signature = 'student {arg}';

    protected $description = "Student malumotlarini calculate qilish uchun!!!";

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $method = $this->argument('arg');
        if (method_exists($this, $method)) {
            $this->$method();
        }
        return 0;
    }

    public function payment()
    {
        $grStudents = GroupStudent::where('status',1)->get();
        foreach ($grStudents as $s){
            UserPayment::firstOrCreate(
                [
                    'user_id' => $s->student_id ?? 0,
                    'group_id' => $s->group_id ?? 0,
                    'month' => date('Ym'),
                ],
                [
                    'amount' => $s->group->cource->price ?? 0,
                    'pay_amount' => 0,
                    'status' => 0,
                    'days' => date('t'),
                ],
            );
        }
    }

}
