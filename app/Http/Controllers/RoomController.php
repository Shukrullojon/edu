<?php

namespace App\Http\Controllers;

use App\Models\Filial;
use App\Models\Room;
use App\Models\RoomTasks;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $rooms = Room::select('id','name','filial_id','status');
        if (isset($request->name)){
            $rooms->where('name','LIKE','%'.$request->name.'%');
        }
        if (isset($request->filial_id)){
            $rooms->where('filial_id',$request->filial_id);
        }
        if (isset($request->status)){
            $rooms->where('status',$request->status);
        }
        $rooms = $rooms->latest()->paginate(20);
        $filials = Filial::all()->pluck('name','id');
        return view('room.index',[
            'rooms' => $rooms,
            'filials' => $filials,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $filials = Filial::where('status',1)->get()->pluck('name','id');
        $tasks = RoomTasks::where('status',1)->get();
        return view('room.create',[
            'filials' => $filials,
            'tasks' => $tasks,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'filial_id' => 'required',
            'status' => 'required',
        ]);
        $room = Room::create($request->all());
        //$room->syncPermissions($request->input('tasks'));
        $room->roomTask()->attach($request->input('tasks'));
        return redirect()->route('room.index')->with('success','Room created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        return view('room.show',[
            'room' => $room,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        $filials = Filial::where('status',1)->get()->pluck('name','id');
        $tasks = RoomTasks::where('status',1)->get();
        return view('room.edit',[
            'room' => $room,
            'filials' => $filials,
            'tasks' => $tasks,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        $this->validate($request, [
            'name' => 'required',
            'filial_id' => 'required',
            'status' => 'required',
        ]);
        $room->update($request->all());
        return redirect()->route('room.index')->with('success','Room updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('room.index')->with('success','Room deleted successfully');
    }
}
