<?php

namespace App\Http\Controllers;

use App\Models\UserHourly;
use App\Models\UserMonth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{
    public function active()
    {
        $salries = UserMonth::where('status', 0)->latest()->get();
        return view('salary.active', [
            'salries' => $salries,
        ]);
    }

    public function archive()
    {
        $salries = UserMonth::where('status', 1)->latest()->paginate(40);
        return view('salary.archive', [
            'salries' => $salries,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'pay_amount' => 'required|numeric',
        ]);

        $salary = UserMonth::find($id);
        $salary->update([
            'pay_salary' => $salary->pay_salary + $request->pay_amount
        ]);
        if ($salary->salary <= $salary->pay_salary) {
            $salary->update([
                'status' => 1,
            ]);
        }
        return back()->with('success', 'Payment updated successfully');
    }

    public function show($id)
    {
        $salary = UserMonth::find($id);
        return view('salary.show', [
            'salary' => $salary,
        ]);
    }

    public function list()
    {
        $salaries = UserMonth::where('user_id', auth()->user()->id)
            ->where('month', date('Ym'))
            ->orderBy('created_at','DESC')
            ->get();
        $hourly = UserHourly::select
        (
            'date',
            DB::raw("SUM(TIMESTAMPDIFF(second,start,end)) as diff"),
            'pay_amount'
        )
            ->where('user_id', auth()->user()->id)
            ->where('end', '!=', null)
            ->where('date', 'LIKE', date('Y-m') . '%')
            ->groupBy(['date', 'pay_amount'])
            ->orderByDesc('date')
            ->get();
        return view('salary.list', [
            'salaries' => $salaries,
            'hourly' => $hourly,
        ]);
    }

    public function listShow($date)
    {
        $lists = UserHourly::select(
            'date',
            'pay_amount',
            'start',
            'end',
            DB::raw("TIMESTAMPDIFF(second,start,end) as diff")
        )
            ->where('date', $date)
            ->where('user_id', auth()->user()->id)
            ->where('end', '!=', null)
            ->get();
        return view('salary.list-show', [
            'lists' => $lists,
        ]);
    }

}

