<?php

namespace App\Http\Controllers;

use App\Helpers\TypeHelper;
use App\Models\Comment;
use App\Models\Event;
use App\Models\EventUser;
use App\Models\Group;
use App\Models\GroupStudent;
use App\Models\PC;
use App\Models\PU;
use App\Models\PUR;
use App\Models\User;
use App\Models\UserAttend;
use App\Models\UserPayment;
use App\Models\Sms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Services\UserService;

class StudentController extends Controller
{
    public $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function all(Request $request)
    {
        $students = User::select(
            'users.id as id',
            'users.name as name',
            'users.phone as phone',
            'users.status as status',
        )
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->where('roles.name', 'Student')
            ->where('model_has_roles.model_type', User::class)
            ->where('users.status', 3);
        if (isset($request->name) and !empty($request->name)) {
            $students = $students->where('users.name', 'LIKE', '%' . $request->name . '%');
        }
        if (isset($request->phone) and !empty($request->phone)) {
            $request->merge(
                ['phone' => str_replace(['(', ')', '-'], '', $request->phone)]
            );
            $students = $students->where('users.phone', 'LIKE', '%' . $request->phone . '%');
        }
        if (isset($request->event_id) and !empty($request->event_id)) {
            $students = $students->where('event_user.event_id', $request->event_id);
        }
        if (isset($request->group_id) and !empty($request->group_id)) {
            $students = $students->where('group_student.group_id', $request->group_id);
        }
        $students = $students
            ->latest('users.updated_at')
            ->groupBy('users.phone')
            ->paginate(40);
        $events = Event::where('status', 1)->get()->pluck('name', 'id');
        $groups = Group::whereIn('status', [1, 2, 3])->get()->pluck('name', 'id');
        return view('student.all', [
            'students' => $students,
            'events' => $events,
            'groups' => $groups,
        ]);
    }

    public function create()
    {
        $events = Event::where('status', 1)->get()->pluck('name', 'id');
        $pcs = PC::where('status', 1)->get()->pluck('name', 'id');
        $groups = Group::whereIn('status', [1, 2])->get()->pluck('name', 'id');
        return view('student.create', [
            'events' => $events,
            'pcs' => $pcs,
            'groups' => $groups,
        ]);
    }

    public function store(Request $request)
    {
        $request->merge(
            ['phone' => str_replace(['(', ')', '-'], '', $request->phone)],
        );
        $request->merge(
            ['parent_phone' => str_replace(['(', ')', '-'], '', $request->parent_phone)],
        );
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'surname' => 'required|min:3|max:50',
            'email' => 'nullable|email',
            'status' => 'required|in:0,1,2,3',
            'phone' => 'required|max:9|unique:users,phone',
            'parent_phone' => 'nullable',
            'event_id' => 'required|exists:events,id',
        ]);
        $role = Role::where('name', 'Student')->first();
        $student = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'status' => $request->status,
            'phone' => $request->phone,
            'parent_phone' => $request->parent_phone,
            'reception_id' => auth()->user()->id,
            'password' => Hash::make($request->phone),
            'is_payment' => ($request->status) ? 1 : 0,
        ]);

        // begin - id_code generatsiya
        $filial_id = '01';
        $this->service->createIdCode($student,$filial_id);
        // end - id_code generatsiya

        $student->assignRole([$role->id]);
        if ($request->event_id) {
            EventUser::create([
                'user_id' => $student->id,
                'change_user_id' => auth()->user()->id,
                'event_id' => $request->event_id,
            ]);
        }
        if ($request->group_id){
            GroupStudent::create([
                'group_id' => $request->group_id,
                'student_id' => $student->id,
                'status' => 1,
            ]);
            $group = Group::find($request->group_id);
            $text = "Helloo)) " . $request->name . " " . $request->surname . " siz " . $group->name . " qo'shildiz sizning darsingiz " . TypeHelper::getGroupDayType($group->type ?? 0) . " dars vaqti " . date("H:i", strtotime($group->detailFirst->begin_time ?? ''));
            Sms::create([
                'phone' => $request->phone,
                'type' => 2,
                'text' => $text,
                'status' => 0,
            ]);

        }
        if ($request->pc_id)
            PU::create([
                'user_id' => $student->id,
                'p_c_id' => $request->pc_id,
                'attach_user_id' => auth()->user()->id,
                'status' => 1,
            ]);

        if ($request->status == 0) {
            return redirect()->route('studentArchive')->with('success', 'Student archived successfully');
        } else if ($request->status == 1) {
            return redirect()->route('studentWaiting')->with('success', 'Student waiting successfully');
        } else if ($request->status == 2) {
            return redirect()->route('studentActive')->with('success', 'Student active successfully');
        }else if($request->status == 3){
            return redirect()->route('studentAll')->with('success', 'Student active successfully');
        } else {
            return back();
        }
    }

    public function show($id)
    {
        $student = User::find($id);
        $groups = Group::whereIn('status',[1,2])->get()->pluck('name','id');
        return view('student.show', [
            'student' => $student,
            'groups' => $groups,
        ]);
    }

    public function edit($id){
        $events = Event::where('status', 1)->get()->pluck('name', 'id');
        $pcs = PC::where('status', 1)->get()->pluck('name', 'id');
        $groups = Group::whereIn('status', [1, 2])->get()->pluck('name', 'id');
        $student = User::find($id);
        return view('student.edit', [
            'student' => $student,
            'events' => $events,
            'pcs' => $pcs,
            'groups' => $groups,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->merge(
            ['phone' => str_replace(['(', ')', '-'], '', $request->phone)]
        );
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'surname' => 'required|min:3|max:50',
            'email' => 'nullable|email',
            'status' => 'required|in:0,1,2,3',
            'phone' => 'required|unique:users,phone,' . $id,
            'event_id' => 'required|exists:events,id',
        ]);
        $student = User::find($id);
        if ($request->pc_id) {
            PU::create([
                'user_id' => $student->id,
                'p_c_id' => $request->pc_id,
                'attach_user_id' => auth()->user()->id,
                'status' => 1,
            ]);
        }

        if ($request->group_id) {
            GroupStudent::where('student_id',$student->id)->where('status',1)->update([
                'status' => 0,
                'closed_at' => date('Y-m-d H:i:s'),
            ]);
            GroupStudent::create([
                'group_id' => $request->group_id,
                'student_id' => $student->id,
                'status' => 1,
            ]);
            $group = Group::find($request->group_id);
            $text = "Helloo)) " . $request->name ?? '' . " " . $request->surname ?? '' . " siz " . $group->name ?? '' . " gruhingiz o'zgartirildi sizning darsingiz " . TypeHelper::getGroupDayType($group->type ?? 0) . " dars vaqti " . date("H:i", strtotime($group->detailFirst->begin_time ?? '')) . " xona raqami: " . $group->detailFirst->room->name ?? '';
            Sms::create([
                'phone' => $request->phone,
                'type' => 2,
                'text' => $text,
                'status' => 0,
            ]);
        }

        if ($request->event_id) {
            EventUser::create([
                'user_id' => $student->id,
                'change_user_id' => auth()->user()->id,
                'event_id' => $request->event_id,
            ]);
        }

        $student->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'status' => $request->status,
            'phone' => $request->phone,
            'parent_phone' => $request->parent_phone,
        ]);
        if ($request->status == 0) {
            return redirect()->route('studentArchive')->with('success', 'Student archived successfully');
        } else if ($request->status == 1) {
            return redirect()->route('studentWaiting')->with('success', 'Student waiting successfully');
        } else if ($request->status == 2) {
            return redirect()->route('studentActive')->with('success', 'Student active successfully');
        } else if ($request->status == 3) {
            return redirect()->route('studentAll')->with('success', 'Student active successfully');
        } else {
            return back();
        }
    }

    public function waiting(Request $request)
    {
        $students = User::select(
            'users.id as id',
            'users.name as name',
            'users.surname as surname',
            'users.phone as phone',
            'users.status as status',
        )
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->where('roles.name', 'Student')
            ->where('model_has_roles.model_type', User::class)
            ->where('users.status', 1);
        if (isset($request->name) and !empty($request->name)) {
            $students = $students->where('users.name', 'LIKE', '%' . $request->name . '%');
        }
        if (isset($request->phone) and !empty($request->phone)) {
            $request->merge(
                ['phone' => str_replace(['(', ')', '-'], '', $request->phone)]
            );
            $students = $students->where('users.phone', 'LIKE', '%' . $request->phone . '%');
        }
        if (isset($request->event_id) and !empty($request->event_id)) {
            $students = $students->where('event_user.event_id', $request->event_id);
        }
        if (isset($request->group_id) and !empty($request->group_id)) {
            $students = $students->where('group_student.group_id', $request->group_id);
        }
        $students = $students
            ->latest('users.updated_at')
            ->groupBy('users.phone')
            ->paginate(40);
        $events = Event::where('status', 1)->get()->pluck('name', 'id');
        $groups = Group::whereIn('status', [1, 2, 3])->get()->pluck('name', 'id');
        return view('student.waiting', [
            'students' => $students,
            'events' => $events,
            'groups' => $groups,
        ]);
    }

    public function active(Request $request)
    {

        $students = User::select(
            'users.id as id',
            'users.name as name',
            'users.surname as surname',
            'users.phone as phone',
            'users.status as status',
        )
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->join('event_user', 'users.id', '=', 'event_user.user_id')
            ->join('group_student', 'users.id', '=', 'group_student.student_id')
            ->where('roles.name', 'Student')
            ->where('model_has_roles.model_type', User::class)
            ->where('users.status', 2);
        if (isset($request->name) and !empty($request->name)) {
            $students = $students->where('users.name', 'LIKE', '%' . $request->name . '%');
        }
        if (isset($request->phone) and !empty($request->phone)) {
            $request->merge(
                ['phone' => str_replace(['(', ')', '-'], '', $request->phone)]
            );
            $students = $students->where('users.phone', 'LIKE', '%' . $request->phone . '%');
        }
        if (isset($request->event_id) and !empty($request->event_id)) {
            $students = $students->where('event_user.event_id', $request->event_id);
        }
        if (isset($request->group_id) and !empty($request->group_id)) {
            $students = $students->where('group_student.group_id', $request->group_id);
        }
        $students = $students
            ->latest('users.updated_at')
            ->groupBy('users.phone')
            ->paginate(40);
        $events = Event::where('status', 1)->get()->pluck('name', 'id');
        $groups = Group::whereIn('status', [1, 2, 3])->get()->pluck('name', 'id');
        return view('student.active', [
            'students' => $students,
            'events' => $events,
            'groups' => $groups,
        ]);
    }

    public function archive(Request $request)
    {
        $students = User::select(
            'users.id as id',
            'users.name as name',
            'users.surname as surname',
            'users.phone as phone',
            'users.status as status',
        )
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->where('roles.name', 'Student')
            ->where('model_has_roles.model_type', User::class)
            ->where('users.status', 0);
        if (isset($request->name) and !empty($request->name)) {
            $students = $students->where('users.name', 'LIKE', '%' . $request->name . '%');
        }
        if (isset($request->phone) and !empty($request->phone)) {
            $request->merge(
                ['phone' => str_replace(['(', ')', '-'], '', $request->phone)]
            );
            $students = $students->where('users.phone', 'LIKE', '%' . $request->phone . '%');
        }
        if (isset($request->event_id) and !empty($request->event_id)) {
            $students = $students->where('event_user.event_id', $request->event_id);
        }
        if (isset($request->group_id) and !empty($request->group_id)) {
            $students = $students->where('group_student.group_id', $request->group_id);
        }
        $students = $students
            ->latest('users.updated_at')
            ->groupBy('users.phone')
            ->paginate(40);
        $events = Event::where('status', 1)->get()->pluck('name', 'id');
        $groups = Group::whereIn('status', [1, 2, 3])->get()->pluck('name', 'id');
        return view('student.archive', [
            'students' => $students,
            'events' => $events,
            'groups' => $groups,
        ]);
    }

    public function work()
    {
        $pu = PU::where('user_id', auth()->user()->id)->where('status', '!=', 3)->latest()->first();
        $pur = PU::where('status', 3)
            ->where('user_id', auth()->user()->id)
            ->latest()
            ->get();
        return view('student.work', [
            'pu' => $pu,
            'pur' => $pur,
        ]);
    }

    public function start($id){
        $pu = PU::where('id',$id)->first();
        $pu->update([
            'status' => 2,
            'start_time' => empty($pu->start_time) ? date('Y-m-d H:i:s') : $pu->start_time
        ]);
        return redirect()->route('studentWork');
    }

    public function workStore(Request $request){
        $this->validate($request, [
            'p_u_id' => 'required',
        ]);
        $pu = PU::where('id',$request->p_u_id)->first();
        $pu->update([
            'status' => 3,
            'spend_time' => (int) ($pu->pc->minute * 60 - $request->spend_time) / 60
        ]);
        foreach ($request->test as $key => $t){
            PUR::create([
                'p_u_id' => $request->p_u_id,
                'p_t_id' => $key,
                'answer' => $t,
            ]);
        }
        return redirect()->route('studentWork');
    }

    public function result($id){
        $pu = PU::where('id',$id)->first();
        return view('student.result',[
            'pu' => $pu,
        ]);
    }

    public function pay(Request $request)
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

        if (isset($request->name) and !empty($request->name)){
            $pays = $pays->join('users','user_payment.user_id','=','users.id')->where('users.name','LIKE','%'.$request->name.'%');
        }
        if (isset($request->group_id) and !empty($request->group_id)){
            $pays->where('user_payment.group_id',$request->group_id);
        }
        if (isset($request->month) and !empty($request->month)){
            $pays->where('user_payment.month',$request->month);
        }

        $pays = $pays->latest('user_payment.id')->paginate(50);

        $groups = Group::whereIn('status',[1,2])->get()->pluck('name','id');
        return view('student.pay', [
            'pays' => $pays,
            'groups' => $groups,
        ]);
    }

    public function nopay()
    {
        $pays = UserPayment::where('status', 0)->latest()->paginate(50);
        $groups = Group::whereIn('status',[1,2])->get()->pluck('name','id');
        return view('student.nopay', [
            'pays' => $pays,
            'groups' => $groups,
        ]);
    }

    public function payupdate(Request $request)
    {
        $this->validate($request, [
            'pay_amount' => 'required|numeric|min:1',
            'amount' => 'nullable|numeric|min:1',
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
        } else {
            $up->update([
                'pay_amount' => $up->pay_amount + $request->pay_amount,
                'status' => $request->status,
                'type' => $request->type,
            ]);
        }
        // write sms
        $user = User::find($request->user_id);
        $text = "Siz to'lov amalga oshirdingiz.
Guruh: ".$up->group->name.' Oy: '.date('Y-m',strtotime($up->month))." To'landi: ".number_format($up->pay_amount,0,' ',' ').' UZS';
        $sms = Sms::create([
            'user_id' => $user->id,
            'phone' => '+998'.$user->phone,
            'type' => 6,
            'text' => $text,
            'status' => 0,
        ]);
        return back()->with('success', 'Payment updated successfully');
    }

    public function noattend(Request $request)
    {
        $noattends = UserAttend::where('created_at', 'LIKE', '%' . date('Y-m-d' . '%'))->where('attend', 0)->get();
        return view('student.noattend', [
            'noattends' => $noattends,
        ]);
    }

    public function noattendupdate(Request $request, $id)
    {
        Comment::updateOrCreate(
            [
                'model' => UserAttend::class,
                'model_id' => $id,
            ],
            [
                'comment' => $request->comment,
                'user_id' => auth()->user()->id
            ]
        );
        return back()->with('success', 'Comment saved');
    }

    public function search(Request $request){
        $students = User::select(
            'users.id as id',
            'users.name as name',
            'users.surname as surname',
            'users.phone as phone',
            'users.status as status',
        )
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->join('event_user', 'users.id', '=', 'event_user.user_id')
            ->join('group_student', 'users.id', '=', 'group_student.student_id')
            ->where('roles.name', 'Student')
            ->where('model_has_roles.model_type', User::class);

        if (isset($request->phone) and !empty($request->phone)) {
            $request->merge(
                ['phone' => str_replace(['(', ')', '-'], '', $request->phone)]
            );
            $students = $students->where('users.phone', 'LIKE', '%' . $request->phone . '%');
        }
        $students = $students
            ->latest('users.updated_at')
            ->groupBy('users.phone')
            ->get();
        return view('student.search', [
            'students' => $students,
        ]);
    }

    public function updategroup(Request $request, $id){
        GroupStudent::where('student_id',$id)->where('status',1)->update([
            'status' => 0,
            'closed_at' => date('Y-m-d H:i:s'),
        ]);
        GroupStudent::create([
            'group_id' => $request->group_id,
            'student_id' => $id,
            'status' => 1,
        ]);
        return back()->with('success', 'Group updated successfully');
    }
}
