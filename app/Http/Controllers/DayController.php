<?php

namespace App\Http\Controllers;

use App\Models\Day;
use Illuminate\Http\Request;

class DayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $days = Day::latest()->paginate(20);
        return view('day.index',[
            'days' => $days
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('day.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
        ]);
        Day::create($request->all());
        return redirect()->route('day.index')->with('success', 'Day saved successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Day $day)
    {
        return view('day.show',[
            'day' => $day,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Day $day)
    {
        return view('day.edit', [
            'day' => $day,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Day $day)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
        ]);
        $request->request->remove('_method');
        $request->request->remove('_token');
        $day->update($request->all());
        return redirect()->route('day.index')->with('success', 'Day updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Day $day)
    {
        $day->delete();
        return redirect()->back()->with('success', 'Day deleted successfully');
    }
}
