<?php

namespace App\Http\Controllers;

use App\Models\Cource;
use App\Models\Day;
use App\Models\File;
use App\Models\Group;
use App\Models\GroupStudent;
use App\Models\Helper;
use App\Models\Lang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
            'users.interes_cource_id as interes_cource_id',
            'users.interes_day_id as interes_day_id',
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
            $students = $students->join('group_students','group_students.student_id','=','users.id');
            $students = $students->where('group_students.group_id', $request->group_id);
        }
        $students = $students
            ->latest('users.id')
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

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $groups = Group::whereIn('status', [1, 2])->get()->pluck('name', 'id');
        $cources = Cource::where('status', 1)->pluck('name', 'id');
        $langs = Lang::pluck('name', 'id');
        $days = Day::pluck('name', 'id');
        return view('student.create', [
            'groups' => $groups,
            'cources' => $cources,
            'langs' => $langs,
            'days' => $days,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge(
            ['phone' => str_replace(['(', ')', '-'], '', $request->phone)],
        );
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'surname' => 'required|min:3|max:50',
            'status' => 'required|in:0,1,2,3,4,5,6,21',
            'phone' => 'required|max:9',
        ]);
        $role = Role::where('name', 'Student')->first();
        $student = User::create([
            'id_code' => $request->id_code,
            'name' => $request->name,
            'surname' => $request->surname,
            'status' => $request->status,
            'phone' => $request->phone,
            'password' => Hash::make($request->phone),
            'interes_cource_id' => $request->cource_id,
            'interes_day_id' => $request->day_id,
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

        return redirect()->route('student.index',[
            'status' => $request->status_page
        ])->with('success', 'Student create successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = User::find($id);
        return view('student.show',[
            'student' => $student,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $groups = Group::whereIn('status', [1, 2])->get()->pluck('name', 'id');
        $cources = Cource::where('status', 1)->pluck('name', 'id');
        $langs = Lang::pluck('name', 'id');
        $days = Day::pluck('name', 'id');
        $student = User::find($id);
        return view('student.edit', [
            'groups' => $groups,
            'cources' => $cources,
            'langs' => $langs,
            'days' => $days,
            'student' => $student,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->merge(
            ['phone' => str_replace(['(', ')', '-'], '', $request->phone)],
        );
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'surname' => 'required|min:3|max:50',
            'email' => 'nullable|email',
            'status' => 'required|in:0,1,2,3,4,5,6,21',
            'phone' => 'required',
        ]);
        $student = User::find($id);
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
            'comment' => $request->comment,
            'series_number' => $request->series_number,
            'interes_cource_id' => $request->cource_id,
            'interes_day_id' => $request->day_id,
            'interes_time' => date("H:i:s", strtotime($request->interes_hour.":".$request->interes_minute)),
        ]);

        return redirect()->route('student.index',[
            'status' => $student->status
        ])->with('success', 'Student update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return redirect()->route('student.index')
            ->with('success', 'Student deleted successfully');
    }
}
