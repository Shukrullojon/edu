<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Direction;
use App\Models\Lang;
use App\Models\Position;
use App\Models\Sms;
use App\Models\UserHourly;
use App\Services\SmsService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::select(
            'users.id as id',
            'users.name as name',
            'users.surname as surname',
            'users.email as email',
            'users.phone as phone',
            'users.status as status',
        );
        if (isset($request->name)){
            $data->where('users.name','LIKE','%'.$request->name.'%');
        }
        if (isset($request->email)){
            $data->where('users.email','LIKE','%'.$request->email.'%');
        }
        if (isset($request->phone)){
            $request->merge(
                [
                    'phone' => str_replace(['(', ')', '-'], '', $request->phone),
                ]
            );
            $data->where('users.phone','LIKE','%'.$request->phone.'%');
        }
        if (isset($request->status)){
            $data->where('users.status',$request->status);
        }

        if (isset($request->position_id)){
            $data->whereHas('positions', function ($query) use ($request) {
                $query->where('positions.id', $request->position_id);
            });
        }

        if (isset($request->direction_id)){
            $data->whereHas('directions', function ($query) use ($request) {
                $query->where('directions.id', $request->direction_id);
            });
        }

        if (isset($request->day_id)){
            $data->whereHas('days', function ($query) use ($request) {
                $query->where('days.id', $request->day_id);
            });
        }

        $data = $data->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->where('roles.name', '!=', 'Student')
            ->where('model_has_roles.model_type', User::class)
            ->latest('users.id')
            ->groupBy('users.id')
            ->paginate(20);
        $positions = Position::pluck('name','id')->all();
        $directions = Direction::pluck('name','id')->all();
        $days = Day::pluck('name','id')->all();
        return view('users.index', [
            'data' => $data,
            'positions' => $positions,
            'directions' => $directions,
            'days' => $days,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        $directions = Direction::pluck('name', 'id')->all();
        $langs = Lang::pluck('name', 'id')->all();
        $days = Day::pluck('name', 'id')->all();
        $positions = Position::pluck('name','id')->all();
        return view('users.create', [
            'roles' => $roles,
            'directions' => $directions,
            'langs' => $langs,
            'days' => $days,
            'positions' => $positions,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
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
            'phone' => 'required|unique:users,phone',
            'email' => 'nullable|email|unique:users,email',
            'password' => 'required|min:5|same:confirm-password',
            'roles' => 'required',
            'salary' => 'nullable|numeric',
            'kpi' => 'nullable|numeric',
            'hourly' => 'nullable|numeric',
            'add_student' => 'nullable|numeric',
            'active_student' => 'nullable|numeric',
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
        $user->positions()->sync($request->input('positions'));
        $user->day_create($request->get('days'));
        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        $directions = Direction::pluck('name', 'id')->all();
        $langs = Lang::pluck('name', 'id')->all();
        $days = Day::pluck('name', 'id')->all();
        $positions = Position::pluck('name','id')->all();
        return view('users.edit', [
            'user' => $user,
            'roles' => $roles,
            'userRole' => $userRole,
            'directions' => $directions,
            'langs' => $langs,
            'days' => $days,
            'positions' => $positions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->merge(
            [
                'phone' => str_replace(['(', ')', '-'], '', $request->phone),
            ]
        );
        $this->validate($request, [
            'name' => 'required',
            'phone' => "required",
            'email' => "nullable|email|",
            'password' => 'nullable|min:5|same:confirm-password',
            'roles' => 'required',
            'salary' => 'nullable|numeric',
            'kpi' => 'nullable|numeric',
            'hourly' => 'nullable|numeric',
            'add_student' => 'nullable|numeric',
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
        $user->positions()->sync($request->input('positions'));
        $user->day_create($request->get('days'));

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }

    public function start(){
        $hourly = UserHourly::create([
            'user_id' => auth()->user()->id,
            'pay_amount' => auth()->user()->hourly,
            'date' => date('Y-m-d'),
            'start' => date('Y-m-d H:i:s'),
        ]);
        session([
            'start' => true,
            'id' => $hourly->id,
            'start_time' => date('Y-m-d H:i:s'),
        ]);
        return back();
    }

    public function end(){
        $id = session('id');
        session([
            'start' => false,
            'id' => null,
        ]);
        UserHourly::where('id',$id)->update([
            'end' => date('Y-m-d H:i:s'),
        ]);
        return back();
    }

    public function change(){
        $user = User::find(auth()->user()->id);
        return view('users.change',[
            'user' => $user,
        ]);
    }

    public function changeupdate(Request $request){
        $this->validate($request, [
            'password' => 'required|min:5|same:confirm-password',
        ]);
        $user = User::find(auth()->user()->id);
        if (\Illuminate\Support\Facades\Hash::check($request->currenct_password, $user->password)){
            $user->update([
                'password' => \Illuminate\Support\Facades\Hash::make($request->password),
            ]);
            return back()->with('success','User changed successfully');
        }
        return back()->with('error','Current password incorrect');
    }

    public function reset(Request $request){
        $request->merge(
            [
                'phone' => str_replace(['(', ')', '-'], '', $request->phone),
            ]
        );
        $this->validate($request, [
            'phone' => 'required|exists:users,phone',
        ]);

        // check sms count
        $c = Sms::where('phone','+998'.$request->phone)->where('created_at','LIKE','%'.date('Y-m-d').'%')->count('id');
        if ($c > 3){
            return back()->with('error','Too many attemps!!!');
        }

        // check count
        $c = Sms::where('type',10)
            ->where('created_at','LIKE','%'.date('Y-m-d').'%')
            ->count('id');
        if ($c > 3){
            return back()->with('error','Daily Limit!!!');
        }

        try {
            $user = User::where('phone',$request->phone)->first();
            $password = rand(100000,999999);
            $sms = Sms::create([
                'user_id' => $user->id,
                'phone' => '+998'.$request->phone,
                'type' => 10,
                'text' => "Sizning yangi parolingiz: ".$password,
                'status' => 0,
            ]);
            $user->update([
                'password' => \Illuminate\Support\Facades\Hash::make($password),
            ]);
            $service = SmsService::login();
            $token = $service["data"]["token"];
            $send = SmsService::send([
                'token' => $token,
                'mobile_phone' => $sms->phone,
                'message' => $sms->text,
            ]);
            if ($send['status'] == 'waiting'){
                $sms->update([
                    'status' => 1,
                ]);
            }
            return redirect()->route('login')->with('success', 'Sms orqali yangi parolingiz yuborildi!!!');
        }catch (\Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }
}
