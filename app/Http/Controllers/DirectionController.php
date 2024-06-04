<?php

namespace App\Http\Controllers;

use App\Models\Direction;
use App\Models\Filial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DirectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filials = Filial::latest()->get()->pluck('name','id');
        $directions = Direction::filter($request->all())->latest()->paginate(20);
        return view('direction.index',[
            'filials' => $filials,
            'directions' => $directions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $filials = Filial::latest()->get()->pluck('name','id');
        return view('direction.create',[
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
        ]);
        if ($validated->fails()){
            return back()->withInput()->withErrors($validated);
        }
        Direction::create($request->all());
        return redirect()->route('direction.index')->with('success','Direction Creat Successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(Direction $direction)
    {
        return view('direction.show',[
            'direction' => $direction
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Direction $direction)
    {
        $filials = Filial::latest()->get()->pluck('name','id');
        return view('direction.edit',[
            'direction' => $direction,
            'filials' => $filials,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Direction $direction)
    {
        $validated = Validator::make($request->all(),[
            'name' => 'required|string|max:100',
            'filial_id' => 'required|exists:filials,id',
        ]);
        if ($validated->fails()){
            return back()->withInput()->withErrors($validated);
        }
        $request->request->remove('_method');
        $request->request->remove('_token');
        $direction->update($request->all());
        return redirect()->route('direction.index')->with('success','Direction Edit Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Direction $direction)
    {
        $direction->delete();
        return redirect()->route('direction.index')->with('success','Direction delete successfuly');
    }
}
