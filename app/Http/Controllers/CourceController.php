<?php

namespace App\Http\Controllers;

use App\Models\Cource;
use App\Models\Filial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filials = Filial::latest()->get()->pluck('name','id');
        $cources = Cource::filter($request->all())->latest()->paginate(20);
        return view('cource.index',[
            'filials' => $filials,
            'cources' => $cources,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $filials = Filial::latest()->get()->pluck('name','id');
        return view('cource.create',[
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
            'time' => 'required',
            'during' => 'required',
            'price' => 'required',
            'filial_id' => 'required|exists:filials,id',
            'status' => 'required|integer|in:1,0',
        ]);
        if ($validated->fails()){
            return back()->withInput()->withErrors($validated);
        }
        Cource::create($request->all());
        return redirect()->route('cource.index')->with('success','Cource Creat Successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cource $cource)
    {
        return view('cource.show',[
            'cource' => $cource
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cource $cource)
    {
        $filials = Filial::latest()->get()->pluck('name','id');
        return view('cource.edit',[
            'cource' => $cource,
            'filials' => $filials,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cource $cource)
    {
        $validated = Validator::make($request->all(),[
            'name' => 'required|string|max:100',
            'time' => 'required',
            'during' => 'required',
            'price' => 'required',
            'filial_id' => 'required|exists:filials,id',
            'status' => 'required|integer|in:1,0',
        ]);
        if ($validated->fails()){
            return back()->withInput()->withErrors($validated);
        }
        $request->request->remove('_method');
        $request->request->remove('_token');
        $cource->update($request->all());
        return redirect()->route('cource.index')->with('success','Cource Edit Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cource $cource)
    {
        $cource->delete();
        return redirect()->route('cource.index')->with('success','Cource delete successfuly');
    }
}
