<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Sms;
use App\Models\User;
use App\Models\UserPayment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function nopay(Request $request)
    {
        $pays = UserPayment::select(
            'user_payment.id',
            'user_payment.user_id',
            'user_payment.group_id',
            'user_payment.amount',
            'user_payment.pay_amount',
            'user_payment.month',
            'user_payment.days',
            'user_payment.type',
            'user_payment.status',
        )
            ->where('user_payment.status', 0);

        if (isset($request->name) and !empty($request->name)) {
            $pays = $pays->join('users', 'user_payment.user_id', '=', 'users.id')->where('users.name', 'LIKE', '%' . $request->name . '%');
        }
        if (isset($request->group_id) and !empty($request->group_id)) {
            $pays->where('user_payment.group_id', $request->group_id);
        }
        if (isset($request->month) and !empty($request->month)) {
            $pays->where('user_payment.month', $request->month);
        }

        $pays = $pays->latest('user_payment.updated_at')->paginate(50);

        $groups = Group::whereIn('status', [1, 2])->get()->pluck('name', 'id');
        return view('payment.nopay', [
            'pays' => $pays,
            'groups' => $groups,
        ]);
    }

    public function pay()
    {
        $pays = UserPayment::select(
            'user_payment.id',
            'user_payment.user_id',
            'user_payment.group_id',
            'user_payment.amount',
            'user_payment.pay_amount',
            'user_payment.month',
            'user_payment.days',
            'user_payment.type',
            'user_payment.status',
            'user_payment.info',
            'user_payment.pay_date',
        )
            ->where('user_payment.status', 2);

        if (isset($request->name) and !empty($request->name)) {
            $pays = $pays->join('users', 'user_payment.user_id', '=', 'users.id')->where('users.name', 'LIKE', '%' . $request->name . '%');
        }
        if (isset($request->group_id) and !empty($request->group_id)) {
            $pays->where('user_payment.group_id', $request->group_id);
        }
        if (isset($request->month) and !empty($request->month)) {
            $pays->where('user_payment.month', $request->month);
        }

        $pays = $pays->latest('user_payment.updated_at')->paginate(50);

        $groups = Group::whereIn('status', [1, 2])->get()->pluck('name', 'id');
        return view('payment.pay', [
            'pays' => $pays,
            'groups' => $groups,
        ]);
    }

    public function later()
    {
        $pays = UserPayment::select(
            'user_payment.id',
            'user_payment.user_id',
            'user_payment.group_id',
            'user_payment.amount',
            'user_payment.pay_amount',
            'user_payment.month',
            'user_payment.days',
            'user_payment.type',
            'user_payment.status',
            'user_payment.info',
            'user_payment.pay_date',
        )
            ->where('user_payment.status', 1);

        if (isset($request->name) and !empty($request->name)) {
            $pays = $pays->join('users', 'user_payment.user_id', '=', 'users.id')->where('users.name', 'LIKE', '%' . $request->name . '%');
        }
        if (isset($request->group_id) and !empty($request->group_id)) {
            $pays->where('user_payment.group_id', $request->group_id);
        }
        if (isset($request->month) and !empty($request->month)) {
            $pays->where('user_payment.month', $request->month);
        }
        $pays = $pays->orderBy('user_payment.pay_date')->paginate(50);

        $groups = Group::whereIn('status', [1, 2])->get()->pluck('name', 'id');
        return view('payment.later', [
            'pays' => $pays,
            'groups' => $groups,
        ]);
    }

    public function payupdate(Request $request)
    {
        $this->validate($request, [
            //'pay_amount' => 'required|numeric|min:1',
            //'amount' => 'nullable|numeric|min:1',
            'days' => 'nullable|numeric|min:1|max:31',
            'status' => 'nullable|numeric',
        ]);
        $up = UserPayment::where('user_id', $request->user_id)
            ->where('group_id', $request->group_id)
            ->where('month', $request->month)
            ->where('status', 0)
            ->first();
        if (empty($up)) {
            $up = UserPayment::create([
                'user_id' => $request->user_id,
                'group_id' => $request->group_id,
                'amount' => $request->amount,
                'pay_amount' => $request->pay_amount,
                'month' => $request->month,
                'days' => $request->days,
                'type' => $request->type,
                'status' => $request->status,
            ]);
            if(!empty($request->info)){
                $up->update([
                    'info' => $request->info,
                ]);
            }
            if (!empty($request->pay_date)){
                $up->update([
                    'pay_date' => date('Y-m-d', strtotime($request->pay_date),),
                ]);
            }
        } else {
            $up->update([
                'pay_amount' => $up->pay_amount + $request->pay_amount,
                'status' => $request->status,
                'type' => $request->type,
            ]);
            if(!empty($request->info)){
                $up->update([
                    'info' => $request->info,
                ]);
            }

            if (!empty($request->pay_date)){
                $up->update([
                    'pay_date' => date('Y-m-d', strtotime($request->pay_date),),
                ]);
            }
        }
        // write sms
        $user = User::find($request->user_id);
        $text = "Siz to'lov amalga oshirdingiz.
Guruh: " . $up->group->name . ' Oy: ' . date('Y-m', strtotime($up->month)) . " To'landi: " . number_format($up->pay_amount, 0, ' ', ' ') . ' UZS';
        $sms = Sms::create([
            'user_id' => $user->id,
            'phone' => '+998' . $user->phone,
            'type' => 6,
            'text' => $text,
            'status' => 0,
        ]);
        return back()->with('success', 'Payment updated successfully');
    }

    public function report(Request $request){
        return view('payment.report');
    }
}
