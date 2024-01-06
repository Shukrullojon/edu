<?php

namespace App\Http\Controllers;

use App\Models\PC;
use Illuminate\Http\Request;

class PCController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pcs = PC::latest()->paginate(20);
        return view('pc.index',[
            'pcs' => $pcs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pc.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:200',
            'minute' => 'required|numeric|max:100',
            'status' => 'required|numeric|in:0,1',
        ]);
        PC::create($request->all());
        return redirect()->route('pc.index')->with('success','Placement category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pc = PC::find($id);
        return view('pc.show',[
            'pc' => $pc,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pc = PC::find($id);
        return view('pc.edit',[
            'pc' => $pc,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:200',
            'minute' => 'required|numeric|max:100',
            'status' => 'required|numeric|in:0,1',
        ]);
        $pc = PC::find($id);
        $pc->update($request->all());
        return redirect()->route('pc.index')
            ->with('success','Placement Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PC::where('id',$id)->update([
            'status' => 0
        ]);
        return redirect()->route('pc.index')
            ->with('success','Placement Category changed status successfully');
    }
}
