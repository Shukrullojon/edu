<?php

namespace App\Http\Controllers;

use App\Helpers\TypeHelper;
use App\Models\Comment;
use App\Models\Cource;
use App\Models\Day;
use App\Models\DayType;
use App\Models\Event;
use App\Models\EventUser;
use App\Models\File;
use App\Models\Filial;
use App\Models\Group;
use App\Models\GroupStudent;
use App\Models\Helper;
use App\Models\Lang;
use App\Models\PC;
use App\Models\PU;
use App\Models\PUR;
use App\Models\Sms;
use App\Models\User;
use App\Models\UserAttend;
use App\Models\UserPayment;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class StudentController extends Controller
{
    public $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $students = User::select(
            'users.id as id',
            'users.id_code as id_code',
            'users.image as image',
            'users.name as name',
            'users.surname as surname',
            'users.phone as phone',
            'users.status as status',
            'users.cource_id as cource_id',
            'users.day_id as day_id',
            'users.interes_time as interes_time',
        )
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->where('roles.name', 'Student')
            ->where('model_has_roles.model_type', User::class);
        if (isset($request->status) and !empty($request->status)){
            $students = $students->where('users.status', $request->status);
        }
        if (isset($request->name) and !empty($request->name)) {
            $students = $students->where('users.name', 'LIKE', '%' . $request->name . '%');
        }
        if (isset($request->surname) and !empty($request->surname)) {
            $students = $students->where('users.surname', 'LIKE', '%' . $request->surname . '%');
        }
        if (isset($request->phone) and !empty($request->phone)) {
            $request->merge(
                ['phone' => str_replace(['(', ')', '-'], '', $request->phone)]
            );
            $students = $students->where('users.phone', 'LIKE', '%' . $request->phone . '%');
        }

        if (isset($request->group_id) and !empty($request->group_id)) {
            $students = $students->join('group_student','group_student.student_id','=','users.id');
            $students = $students->where('group_student.group_id', $request->group_id);
        }
        $students = $students
            ->latest('users.updated_at')
            ->groupBy('users.phone')
            ->paginate(30);

        $groups = Group::whereIn('status', [1, 2, 3])->get()->pluck('name', 'id');
        $cnt = User::select("users.status",DB::raw("count(users.id) as number"))
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->where('roles.name', 'Student')
            ->where('model_has_roles.model_type', User::class)
            ->groupBy('users.status')
            ->get()
            ->pluck('number','status');

        return view('student.index',[
            'students' => $students,
            'cnt' => $cnt,
            'groups' => $groups
        ]);
    }

    public function create($status = null)
    {
        $events = Event::where('status', 1)->get()->pluck('name', 'id');
        $pcs = PC::where('status', 1)->get()->pluck('name', 'id');
        $groups = Group::whereIn('status', [1, 2])->get()->pluck('name', 'id');
        $cources = Cource::where('status', 1)->pluck('name', 'id');
        $langs = Lang::pluck('name', 'id');
        $days = Day::pluck('name', 'id');
        return view('student.create', [
            'status' => $status,
            'events' => $events,
            'pcs' => $pcs,
            'groups' => $groups,
            'cources' => $cources,
            'langs' => $langs,
            'days' => $days,
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
            'status' => 'required|in:0,1,2,3,4,5,6',
            'phone' => 'required|max:9',
            'parent_phone' => 'nullable',
        ]);
        $role = Role::where('name', 'Student')->first();
        $student = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'status' => $request->status,
            'phone' => $request->phone,
            'parent_phone' => $request->parent_phone,
            'password' => Hash::make($request->phone),
            'cource_id' => $request->cource_id,
            'day_id' => $request->day_id,
            'interes_time' => date("H:i:s", strtotime($request->interes_hour.":".$request->interes_minute)),
        ]);

        $student->assignRole([$role->id]);
        if ($request->group_id) {
            GroupStudent::create([
                'group_id' => $request->group_id,
                'student_id' => $student->id,
                'status' => 1,
            ]);
        }

        if ($request->langs) {
            foreach ($request->langs as $lang){
                Helper::create([
                    'model' => Lang::class,
                    'model_id' => $lang,
                    'table' => User::class,
                    'table_id' => $student->id
                ]);
            }
        }

        if ($request->days){
            foreach ($request->days as $day){
                Helper::create([
                    'model' => Day::class,
                    'model_id' => $day,
                    'table' => User::class,
                    'table_id' => $student->id
                ]);
            }
        }

        return redirect()->route('studentIndex',[
            'status' => $request->status_page
        ])->with('success', 'Student create successfully');
    }

    public function show($id)
    {
        $student = User::find($id);
        $groups = Group::whereIn('status', [1, 2])->get()->pluck('name', 'id');
        return view('student.show', [
            'student' => $student,
            'groups' => $groups,
        ]);
    }

    public function edit($id)
    {
        $events = Event::where('status', 1)->get()->pluck('name', 'id');
        $pcs = PC::where('status', 1)->get()->pluck('name', 'id');
        $groups = Group::whereIn('status', [1, 2])->get()->pluck('name', 'id');
        $cources = Cource::where('status', 1)->pluck('name', 'id');
        $student = User::find($id);
        return view('student.edit', [
            'student' => $student,
            'events' => $events,
            'pcs' => $pcs,
            'groups' => $groups,
            'cources' => $cources,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->merge(
            ['phone' => str_replace(['(', ')', '-'], '', $request->phone)],
        );
        $request->merge(
            ['parent_phone' => str_replace(['(', ')', '-'], '', $request->phone)],
        );
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'surname' => 'required|min:3|max:50',
            'email' => 'nullable|email',
            'status' => 'required|in:0,1,2,3,4,5,6',
            'phone' => 'required',
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
            GroupStudent::where('student_id', $student->id)->where('status', 1)->update([
                'status' => 0,
                'closed_at' => date('Y-m-d H:i:s'),
            ]);
            GroupStudent::create([
                'group_id' => $request->group_id,
                'student_id' => $student->id,
                'status' => 1,
            ]);
        }

        if ($request->hasFile('image')){
            if (!empty($student->image)){
                Storage::delete('public/image/'.$student->image);
            }
            $filenameWithExt = $request->file('image')->getClientOriginalName ();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename. '_'. time().'.'.$extension;
            $request->image->move(public_path('image'), $fileNameToStore);
            $student->update([
                'image' => $fileNameToStore,
            ]);
        }

        if ($request->hasFile('docs')){
            File::where('model',User::class)
                ->where('model_id',$student->id)
                ->delete();
            foreach ($request->docs as $doc){
                $filenameWithExt = $doc->getClientOriginalName ();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $doc->getClientOriginalExtension();
                $fileNameToStore = $filename. '_'. time().'.'.$extension;
                $doc->move(public_path('image'), $fileNameToStore);
                File::create([
                    'model' => User::class,
                    'model_id' => $student->id,
                    'file' => $fileNameToStore,
                    'type' => 0,
                ]);
            }
        }

        $student->update([
            'id_code' => $request->id_code,
            'name' => $request->name,
            'surname' => $request->surname,
            'status' => $request->status,
            'phone' => $request->phone,
            'parent_phone' => $request->parent_phone,
            'cource_id' => $request->cource_id,
            'interes_time' => $request->interes_time,
            'comment' => $request->comment,
            'series_number' => $request->series_number,
        ]);

        return redirect()->route('studentIndex',[
            'status' => $student->status
        ])->with('success', 'Student update successfully');
    }

    public function doc($id){
        $file = File::find($id);
        $filePath = public_path('image/' . $file->file);
        return response()->download($filePath);
    }

    public function doc_delete($id){
        $file = File::find($id);
        $filePath = public_path('image/' . $file->file);
        if (file_exists($filePath)) {
            unlink($filePath);
            $file->delete();
        }
        return redirect()->back()->with('success', 'File delete ');
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

    public function start($id)
    {
        $pu = PU::where('id', $id)->first();
        $pu->update([
            'status' => 2,
            'start_time' => empty($pu->start_time) ? date('Y-m-d H:i:s') : $pu->start_time
        ]);
        return redirect()->route('studentWork');
    }

    public function workStore(Request $request)
    {
        $this->validate($request, [
            'p_u_id' => 'required',
        ]);
        $pu = PU::where('id', $request->p_u_id)->first();
        $pu->update([
            'status' => 3,
            'spend_time' => (int)($pu->pc->minute * 60 - $request->spend_time) / 60
        ]);
        foreach ($request->test as $key => $t) {
            PUR::create([
                'p_u_id' => $request->p_u_id,
                'p_t_id' => $key,
                'answer' => $t,
            ]);
        }
        return redirect()->route('studentWork');
    }

    public function result($id)
    {
        $pu = PU::where('id', $id)->first();
        return view('student.result', [
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

        if (isset($request->name) and !empty($request->name)) {
            $pays = $pays->join('users', 'user_payment.user_id', '=', 'users.id')->where('users.name', 'LIKE', '%' . $request->name . '%');
        }
        if (isset($request->group_id) and !empty($request->group_id)) {
            $pays->where('user_payment.group_id', $request->group_id);
        }
        if (isset($request->month) and !empty($request->month)) {
            $pays->where('user_payment.month', $request->month);
        }

        $pays = $pays->latest('user_payment.id')->paginate(50);

        $groups = Group::whereIn('status', [1, 2])->get()->pluck('name', 'id');
        return view('student.pay', [
            'pays' => $pays,
            'groups' => $groups,
        ]);
    }

    public function nopay()
    {
        $pays = UserPayment::where('status', 0)->latest()->paginate(50);
        $groups = Group::whereIn('status', [1, 2])->get()->pluck('name', 'id');
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

    public function search(Request $request)
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

    public function updategroup(Request $request, $id)
    {
        GroupStudent::where('student_id', $id)->where('status', 1)->update([
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

    public function addGroup(Request $request)
    {

        $this->validate($request, [
            'group_id' => 'required',
            'student_id' => 'required',
        ]);
        $student_id = explode(',', $request->student_id);

        $group_id = $request->group_id;

        foreach ($student_id as $key => $id) {
            $exists = GroupStudent::where('group_id', $group_id)->where('student_id', $id)->exists();

            if (!$exists) {
                GroupStudent::create([
                    'group_id' => $group_id,
                    'student_id' => $id,
                ]);
            }

        }

        return back()->with('success', 'Student add group successfully');

    }

    public function addNewGroup(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'start_time' => 'required|date_format:Y-m-d H:i:s',
            'type' => 'required|numeric|in:1,2,3',
            'max_student' => 'required|numeric|min:0',
            'cource_id' => 'required|exists:cources,id',
            'filial_id' => 'required|exists:filials,id',
            'status' => 'required|in:1,2,3',
            'student_id' => 'required',
        ]);

        $request->request->add([
            'color' => rand(100000, 999999),
        ]);

        $group = Group::create($request->all());

        $student_id = explode(',', $request->student_id);

        foreach ($student_id as $key => $id) {
            GroupStudent::create([
                'group_id' => $group->id,
                'student_id' => $id,
            ]);
        }

        return back()->with('success', 'Student add new group successfully');

    }
}
