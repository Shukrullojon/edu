<?php

namespace App\Http\Controllers;

use App\Models\Cource;
use App\Models\Filial;
use App\Models\Group;
use App\Models\GroupDetail;
use App\Models\GroupStudent;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $groups = Group::select('id','name','type','start_time','cource_id','filial_id','max_student','status','color');
        if (isset($request->name)){
            $groups->where('name','LIKE','%'.$request->name.'%');
        }
        if (isset($request->type)){
            $groups->where('type',$request->type);
        }
        if (isset($request->cource_id)){
            $groups->where('cource_id',$request->cource_id);
        }
        if (isset($request->filial_id)){
            $groups->where('filial_id',$request->filial_id);
        }
        if (isset($request->status)){
            $groups->where('status',$request->status);
        }
        $groups = $groups->latest()->paginate(20);
        $filials = Filial::all()->pluck('name','id');
        $cources = Cource::all()->pluck('name','id');
        return view('group.index', [
            'groups' => $groups,
            'filials' => $filials,
            'cources' => $cources,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cources = Cource::where('status', 1)->latest()->get()->pluck('name', 'id');
        $filials = Filial::where('status', 1)->latest()->get()->pluck('name', 'id');
        return view('group.create', [
            'cources' => $cources,
            'filials' => $filials,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'start_time' => 'required|date_format:Y-m-d H:i:s',
            'type' => 'required|numeric|in:1,2,3',
            'max_student' => 'required|numeric|min:0',
            'cource_id' => 'required|exists:cources,id',
            'filial_id' => 'required|exists:filials,id',
            'status' => 'required|in:1,2,3',
        ]);

        $request->request->add([
            'color' => rand(100000,999999),
        ]);
        $group = Group::create($request->all());
        return redirect()->route('group.show', $group->id)->with('success', 'Group created successfully');
    }

    public function detailstore(Request $request)
    {
        $this->validate($request, [
            'room_id' => 'required',
            'teacher_id' => 'required',
            'begin_time' => 'required',
            'end_time' => 'required',
            'status' => 'required',
        ]);
        GroupDetail::create([
            'group_id' => $request->group_id,
            'room_id' => $request->room_id,
            'teacher_id' => $request->teacher_id,
            'begin_time' => $request->begin_time,
            'end_time' => $request->end_time,
            'status' => $request->status,
        ]);
        return redirect()->route('group.show', $request->group_id)->with('success', 'Group Details created successfully');
    }

    public function studentstore(Request $request)
    {
        $this->validate($request, [
            'group_id' => 'required',
            'student_id' => 'required',
            'status' => 'required',
        ]);
        GroupStudent::create([
            'group_id' => $request->group_id,
            'student_id' => $request->student_id,
            'status' => $request->status,
        ]);
        return redirect()->route('group.show', $request->group_id)->with('success', 'Group Student created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $rooms = Room::where('status', 1)->latest()->get()->pluck('name', 'id');
        $teachers = User::select(
            'users.id as id',
            'users.name as name',
            'users.surname as surname',
            'users.phone as phone',
            'users.status as status',
        )
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->where('roles.name', 'Teacher')
            ->where('model_has_roles.model_type', User::class)
            ->where('users.status', 1)
            ->latest('users.updated_at')
            ->get()->pluck('name', 'id');
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
            ->whereIn('users.status', [2, 3])
            ->latest('users.updated_at')
            ->get()->pluck('name', 'id');
        $group = Group::find($id);
        return view('group.show', [
            'group' => $group,
            'rooms' => $rooms,
            'teachers' => $teachers,
            'students' => $students,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $group = Group::find($id);
        $cources = Cource::where('status', 1)->latest()->get()->pluck('name', 'id');
        $filials = Filial::where('status', 1)->latest()->get()->pluck('name', 'id');
        return view('group.edit', [
            'group' => $group,
            'cources' => $cources,
            'filials' => $filials,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'start_time' => 'required|date_format:Y-m-d H:i:s',
            'type' => 'required|numeric|in:1,2,3',
            'max_student' => 'required|numeric|min:0',
            'cource_id' => 'required|exists:cources,id',
            'filial_id' => 'required|exists:filials,id',
            'status' => 'required|in:1,2,3',
        ]);
        $request->request->remove('_method');
        $request->request->remove('_token');
        Group::where('id', $id)->update($request->all());
        return redirect()->route('group.show', $id)->with('success', 'Group updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Group::where('id', $id)->delete();
        return redirect()->route('group.index')->with('success', 'Group deleted successfully');
    }

    public function detailupdate(Request $request, $id)
    {
        $request->request->remove('_method');
        $request->request->remove('_token');
        $detail = GroupDetail::where('id', $id)->update($request->all());
        return back()->with('success', 'Details updated successfully');
    }

    public function add(Request $request, $id){
        if ($request->post()){
            GroupStudent::where('group_id',$id)->where('student_id',$request->student_id)->where('status',1)->update([
                'closed_at' => date('Y-m-d H:i:s'),
                'status' => 0,
            ]);

            GroupStudent::create([
                'group_id' => $id,
                'student_id' => $request->student_id,
                'status' => 1,
            ]);
            return redirect()->route('group.show', $id)->with('success', 'Student added successfully');
        }

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
            ->whereIn('users.status', [2, 3])
            ->latest('users.updated_at')
            ->get()->pluck('name', 'id');
        $group = Group::find($id);
        return view('group.add',[
            'students' => $students,
            'group' => $group,
        ]);
    }

    public function detail(Request $request, $id){
        if ($request->post()){
            GroupDetail::create([
                'group_id' => $id,
                'room_id' => $request->room_id,
                'teacher_id' => $request->teacher_id,
                'begin_time' => $request->begin_time,
                'end_time' => $request->end_time,
                'status' => $request->status,
                'comment' => $request->comment,
                'type' => $request->type_detail,
                'amount' => $request->amount,
            ]);
            return redirect()->route('group.show', $id)->with('success', 'Details added successfully');
        }

        $group = Group::find($id);
        $rooms = Room::where('status', 1)->latest()->get()->pluck('name', 'id');
        $teachers = User::select(
            'users.id as id',
            'users.name as name',
            'users.surname as surname',
            'users.phone as phone',
            'users.status as status',
        )
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->where('roles.name', 'Teacher')
            ->where('model_has_roles.model_type', User::class)
            ->where('users.status', 1)
            ->latest('users.updated_at')
            ->get()->pluck('name', 'id');
        return view('group.detail',[
            'rooms' => $rooms,
            'teachers' => $teachers,
            'group' => $group,
        ]);

    }
}
