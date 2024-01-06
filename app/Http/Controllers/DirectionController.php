<?php

namespace App\Http\Controllers;

use App\Models\Direction;
use Illuminate\Http\Request;

class DirectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $directions = Direction::latest()->paginate(20);
        return view('direction.index',[
            'directions' => $directions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('direction.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        Direction::create($request->all());
        return redirect()->route('direction.index')->with('success','Direction created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Direction $direction)
    {
        return view('direction.show',[
            'direction' => $direction,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Direction $direction)
    {
        return view('direction.edit',[
            'direction' => $direction,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Direction $direction)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $direction->update([
            'name' => $request->name,
        ]);
        return redirect()->route('direction.index')
            ->with('success','Direction updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Direction $direction)
    {
        $direction->delete();
        return redirect()->route('direction.index')
            ->with('success','Direction deleted successfully');
    }
}
