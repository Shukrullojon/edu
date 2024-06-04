<?php

namespace App\Http\Controllers;

use App\Models\Filial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FilialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filials = Filial::filter($request->all())->latest()->paginate(20);
        return view('filial.index',[
            'filials' => $filials,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('filial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'name' => 'required|string|max:100',
            'address' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'room_count' => 'required|integer',
            'status' => 'required|integer|in:1,0',
        ]);
        if ($validated->fails()){
            return back()->withInput()->withErrors($validated);
        }
        Filial::create($request->all());
        return redirect()->route('filial.index')->with('success','Filial Creat Successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(Filial $filial)
    {
        return view('filial.show',[
            'filial' => $filial
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Filial $filial)
    {
        return view('filial.edit',[
            'filial' => $filial,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Filial $filial)
    {
        $validated = Validator::make($request->all(),[
            'name' => 'required|string|max:100',
            'address' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'room_count' => 'required|integer',
            'status' => 'required|integer|in:1,0',
        ]);
        if ($validated->fails()){
            return back()->withInput()->withErrors($validated);
        }
        $request->request->remove('_method');
        $request->request->remove('_token');
        $filial->update($request->all());
        return redirect()->route('filial.index')->with('success','Filial Edit Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Filial $filial)
    {
        $filial->delete();
        return redirect()->route('filial.index')->with('success','Filial delete successfuly');
    }
}
