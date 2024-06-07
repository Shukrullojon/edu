<?php

namespace App\Http\Controllers;

use App\Models\Cource;
use App\Models\Day;
use App\Models\Direction;
use App\Models\Filial;
use App\Models\Group;
use App\Models\GroupSchedule;
use App\Models\GroupStudent;
use App\Models\GroupTeacher;
use App\Models\Lang;
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
        $groups = Group::select(
            'id',
            'name',
            'start_date',
            'start_hour',
            'cource_id',
            'filial_id',
            'lang_id',
            'max_student',
            'max_teacher',
            'status',
            'day_id',
            );
        if (isset($request->name)) {
            $groups->where('name', 'LIKE', '%' . $request->name . '%');
        }
        if (isset($request->cource_id)) {
            $groups->where('cource_id', $request->cource_id);
        }
        if (isset($request->filial_id)) {
            $groups->where('filial_id', $request->filial_id);
        }
        if (isset($request->status)) {
            $groups->where('status', $request->status);
        }
        if (isset($request->day_id)) {
            $groups->where('day_id', $request->day_id);
        }
        $groups = $groups->latest('groups.id')->paginate(20);
        $filials = Filial::all()->pluck('name', 'id');
        $cources = Cource::all()->pluck('name', 'id');
        $days = Day::all()->pluck('name', 'id');
        return view('group.index', [
            'groups' => $groups,
            'filials' => $filials,
            'cources' => $cources,
            'days' => $days,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cources = Cource::where('status', 1)->latest()->get()->pluck('name', 'id');
        $filials = Filial::where('status', 1)->latest()->get()->pluck('name', 'id');
        $days = Day::latest()->get()->pluck('name', 'id');
        $directions = Direction::latest()->get()->pluck('name', 'id');
        $rooms = Room::where('status', 1)->latest()->get()->pluck('name', 'id');
        $langs = Lang::latest()->get()->pluck('name', 'id');
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
            'users.id_code as id_code',
            'users.status as status',
        )
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->where('roles.name', 'Student')
            ->where('model_has_roles.model_type', User::class)
            ->whereIn('users.status', [1,2,3,4,5,6])
            ->latest('users.updated_at')
            ->groupBy('users.id')
            ->get();

        return view('group.create', [
            'cources' => $cources,
            'filials' => $filials,
            'days' => $days,
            'rooms' => $rooms,
            'teachers' => $teachers,
            'students' => $students,
            'directions' => $directions,
            'langs' => $langs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'start_date' => 'nullable|date_format:Y-m-d',
            'day_id' => 'required|integer|exists:days,id',
            'lang_id' => 'required|integer|exists:langs,id',
            'max_student' => 'required|numeric|min:0',
            'max_teacher' => 'required|numeric|min:0',
            'cource_id' => 'required|exists:cources,id',
            'filial_id' => 'required|exists:filials,id',
            'status' => 'required|in:1,2,3',
        ]);
        $request->request->add([
            'start_date' => date('Y-m-d', strtotime($request->start_date),),
            'start_hour' => date('H:i:s', strtotime($request->start_hour.':'.$request->start_minute),),
        ]);
        $request->request->remove('start_minute');
        $group = Group::create([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'start_hour' => $request->start_hour,
            'filial_id' => $request->filial_id,
            'cource_id' => $request->cource_id,
            'lang_id' => $request->lang_id,
            'day_id' => $request->day_id,
            'max_student' => $request->max_student,
            'max_teacher' => $request->max_teacher,
            'status' => $request->status,
        ]);

        if (!empty($request->students)){
            foreach ($request->students as $student){
                if (!empty($student)){
                    GroupStudent::where('student_id',$student)->where('status',1)->update([
                        'status' => 0,
                        'closed_at' => date("Y-m-d"),
                    ]);
                    GroupStudent::create([
                        'group_id' => $group->id,
                        'student_id' => $student,
                        'status' => 1,
                    ]);
                }
            }
        }

        if(!empty($request->teacher)){
            foreach ($request->teacher as $key => $t){
                if ($key == $request->teacher_counter)
                    continue;
                GroupTeacher::create([
                    'group_id' => $group->id,
                    'room_id' => $t['room_id'] ?? 0,
                    'teacher_id' => $t['teacher_id'] ?? 0,
                    'direction_id' => $t['direction_id'] ?? 0,
                    'day_id' => $group->day_id,
                    'begin_time' => date("H:i:s", strtotime($t['begin_hour'].':'.$t['begin_minute'])),
                    'end_time' => date("H:i:s", strtotime($t['end_hour'].':'.$t['end_minute'])),
                    'status' => 1,
                ]);
            }
        }
        $this->schedule($group);
        return redirect()->route('group.show', $group->id)->with('success', 'Group created successfully');
    }

    public function schedule($group)
    {
        $group_teachers = GroupTeacher::where('group_id',$group->id)->get();
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
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        return view('group.show',[
            'group' => $group,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        $group->delete();
        return redirect()->route('group.index')->with('success','Group delete successfuly');
    }

    public function studentDestroy($id)
    {
        $g = GroupStudent::find($id);
        $g->update([
            'closed_at' => date("Y-m-d"),
            'status' => 0,
        ]);
        return redirect()->route('group.show',$g->group_id)->with('success','Student delete successfuly');
    }
}
