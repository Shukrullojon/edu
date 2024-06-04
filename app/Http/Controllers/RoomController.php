<?php

namespace App\Http\Controllers;

use App\Models\Filial;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $rooms = Room::filter($request->all())->latest()->paginate(20);
        $filials = Filial::latest()->get()->pluck('name','id');
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
        $filials = Filial::latest()->get()->pluck('name','id');
        return view('room.create',[
            'filials' => $filials,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'name' => 'required|string|max:100',
            'filial_id' => 'required|exists:filials,id',
            'status' => 'required|integer|in:1,0',
        ]);
        if ($validated->fails()){
            return back()->withInput()->withErrors($validated);
        }
        Room::create($request->all());
        return redirect()->route('room.index')->with('success','Room Creat Successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        return view('room.show',[
            'room' => $room
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        $filials = Filial::latest()->get()->pluck('name','id');
        return view('room.edit',[
            'room' => $room,
            'filials' => $filials,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        $validated = Validator::make($request->all(),[
            'name' => 'required|string|max:100',
            'filial_id' => 'required|exists:filials,id',
            'status' => 'required|integer|in:1,0',
        ]);
        if ($validated->fails()){
            return back()->withInput()->withErrors($validated);
        }
        $request->request->remove('_method');
        $request->request->remove('_token');
        $room->update($request->all());
        return redirect()->route('room.index')->with('success','Room Edit Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('room.index')->with('success','Room delete successfuly');
    }
}
