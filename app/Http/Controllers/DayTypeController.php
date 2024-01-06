<?php

namespace App\Http\Controllers;

use App\Models\Cource;
use App\Models\DayType;
use Illuminate\Http\Request;

class DayTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $day_types = DayType::orderBy('id','ASC')->get();
        return view('day-type.index',[
            'day_types' => $day_types
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cources = Cource::where('status', 1)->latest()->get()->pluck('name', 'id');

        return view('day-type.create',[
            'cources' => $cources,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'days' => 'required'
        ]);

        $inputs = $request->all();
        $inputs['days'] = json_encode($inputs['days']);

        $group = DayType::create($inputs);

        return redirect()->route('day-type.index')->with('success', 'Day type saved successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $day_types = DayType::find($id);
        return view('day-type.edit', [
            'day_types' => $day_types,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'days' => 'required'
        ]);

        $request->request->remove('_method');
        $request->request->remove('_token');

        $inputs = $request->all();
        $inputs['days'] = json_encode($inputs['days']);

        DayType::where('id', $id)->update($inputs);

        return redirect()->route('day-type.index')->with('success', 'Day type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DayType::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Day type deleted successfully');
    }
}
