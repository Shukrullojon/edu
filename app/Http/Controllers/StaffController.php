<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Direction;
use App\Models\Filial;
use App\Models\Lang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::select(
            'users.id as id',
            'users.name as name',
            'users.surname as surname',
            'users.email as email',
            'users.phone as phone',
            'users.status as status',
            'users.filial_id as filial_id',
        );
        if (isset($request->name)){
            $users->where('users.name','LIKE','%'.$request->name.'%');
        }
        if (isset($request->email)){
            $users->where('users.email','LIKE','%'.$request->email.'%');
        }
        if (isset($request->phone)){
            $request->merge(
                [
                    'phone' => str_replace(['(', ')', '-'], '', $request->phone),
                ]
            );
            $users->where('users.phone','LIKE','%'.$request->phone.'%');
        }
        if (isset($request->status)){
            $users->where('users.status',$request->status);
        }

        if (isset($request->position_id)){
            $users->whereHas('positions', function ($query) use ($request) {
                $query->where('positions.id', $request->position_id);
            });
        }

        if (isset($request->direction_id)){
            $users->whereHas('directions', function ($query) use ($request) {
                $query->where('directions.id', $request->direction_id);
            });
        }

        if (isset($request->day_id)){
            $users->whereHas('days', function ($query) use ($request) {
                $query->where('days.id', $request->day_id);
            });
        }

        $users = $users->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->where('roles.name', '!=', 'Student')
            ->where('model_has_roles.model_type', User::class)
            ->latest('users.id')
            ->groupBy('users.id')
            ->paginate(20);
        $directions = Direction::pluck('name','id')->all();
        $days = Day::pluck('name','id')->all();
        return view('staff.index', [
            'users' => $users,
            'directions' => $directions,
            'days' => $days,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $filials = Filial::latest()->get()->pluck('name','id');
        $roles = Role::pluck('name', 'name')->all();
        $directions = Direction::pluck('name', 'id')->all();
        $langs = Lang::pluck('name', 'id')->all();
        return view('staff.create',[
            'filials' => $filials,
            'roles' => $roles,
            'directions' => $directions,
            'langs' => $langs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge(
            [
                'phone' => str_replace(['(', ')', '-'], '', $request->phone),
            ]
        );
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'filial_id' => 'required|exists:filials,id',
            'password' => 'required|min:5|same:confirm-password',
            'roles' => 'required'
        ]);
        $request->merge(
            [
                'password' => Hash::make($request->password),
            ]
        );
        $user = User::create($request->all());
        $user->assignRole($request->input('roles'));
        $user->directions()->sync($request->input('directions'));
        $user->langs()->sync($request->input('langs'));
        return redirect()->route('staff.index')
            ->with('success', 'Staff created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('staff.show',[
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $filials = Filial::latest()->get()->pluck('name','id');
        $roles = Role::pluck('name', 'name')->all();
        $directions = Direction::pluck('name', 'id')->all();
        $langs = Lang::pluck('name', 'id')->all();
        $staff = User::with('roles')->find($id);
        $user_roles = $staff->roles->pluck('name','name');
        return view('staff.edit',[
            'filials' => $filials,
            'roles' => $roles,
            'directions' => $directions,
            'langs' => $langs,
            'staff' => $staff,
            'user_roles' => $user_roles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->merge(
            [
                'phone' => str_replace(['(', ')', '-'], '', $request->phone),
            ]
        );
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'filial_id' => 'required|exists:filials,id',
            'password' => 'nullable|min:5|same:confirm-password',
            'roles' => 'required'
        ]);

        $request->request->remove('_method');
        $request->request->remove('_token');
        if (!empty($request->password)){
            $request->merge(
                ['password' => Hash::make($request->password)]
            );
        } else {
            $request->request->remove('password');
        }
        $user = User::find($id);
        $user->update($request->all());
        if ($request->roles){
            DB::table('model_has_roles')->where('model_id', $id)->delete();
            $user->assignRole($request->input('roles'));
        }
        $user->directions()->sync($request->input('directions'));
        $user->langs()->sync($request->input('langs'));
        return redirect()->route('staff.index')
            ->with('success', 'Staff updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return redirect()->route('staff.index')
            ->with('success', 'Staff deleted successfully');
    }
}
