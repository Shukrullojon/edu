<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\UserHourly;
use App\Models\UserMonth;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SalaryCommand extends Command
{
    protected $signature = 'salary {arg}';

    protected $description = "Oylikni calculate qilish uchun!!!";

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

    public function month()
    {
        $employees = User::select(
            'users.id as id',
            'users.status as status',
            'users.salary as salary',
            'users.kpi as kpi',
        )
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->where('roles.name', '!=', 'Student')
            ->where('model_has_roles.model_type', User::class)
            ->where('users.status', '!=', 0)
            ->latest('users.id')
            ->groupBy('users.id')
            ->get();
        foreach ($employees as $employee) {
            if ($employee->salary) {
                UserMonth::firstOrCreate(
                    [
                        'user_id' => $employee->id,
                        'month' => date('Ym'),
                        'type' => 1,
                    ],
                    [
                        'salary' => $employee->salary,
                        'pay_salary' => 0,
                        'status' => 0,
                    ]
                );
            }

            if ($employee->kpi) {
                UserMonth::firstOrCreate(
                    [
                        'user_id' => $employee->id,
                        'month' => date('Ym'),
                        'type' => 2,
                    ],
                    [
                        'salary' => $employee->kpi,
                        'pay_salary' => 0,
                        'status' => 0,
                        'type' => 2,
                    ]
                );
            }

        }
    }

    public function hourly()
    {
        $hourly = UserHourly::select
        (
            'user_id',
            DB::raw("SUM(TIMESTAMPDIFF(second,start,end)) as diff"),
            'pay_amount'
        )
            ->where('end', '!=', null)
            ->where('date', 'LIKE', date("Y-m") . '%')
            ->groupBy(['pay_amount', 'user_id'])
            ->get();
        foreach ($hourly as $h) {
            UserMonth::create([
                'user_id' => $h->user_id,
                'month' => date("Ym"),
                'salary' => (int)($h->pay_amount * $h->diff) / 3600,
                'pay_salary' => 0,
                'status' => 0,
                'type' => 3
            ]);
        }
    }

    public function add(){

    }
}
