<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $positions = Position::latest()->paginate(20);
        return view('position.index',[
            'positions' => $positions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('position.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'status' => 'required|integer',
        ]);
        Position::create($request->all());
        return redirect()->route('position.index')->with('success', 'Position saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Position $position)
    {
        return view('position.show',[
            'position' => $position,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Position $position)
    {
        return view('position.edit', [
            'position' => $position,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Position $position)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'status' => 'required|integer',
        ]);
        $request->request->remove('_method');
        $request->request->remove('_token');
        $position->update($request->all());
        return redirect()->route('position.index')->with('success', 'Position updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Position $position)
    {
        $position->delete();
        return redirect()->back()->with('success', 'Position deleted successfully');
    }
}
