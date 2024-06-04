<?php

namespace App\Http\Controllers;

use App\Models\Filial;
use App\Models\Lang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filials = Filial::latest()->get()->pluck('name','id');
        $langs = Lang::filter($request->all())->latest()->paginate(20);
        return view('lang.index',[
            'filials' => $filials,
            'langs' => $langs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $filials = Filial::latest()->get()->pluck('name','id');
        return view('lang.create',[
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
        Lang::create($request->all());
        return redirect()->route('lang.index')->with('success','Lang Creat Successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lang $lang)
    {
        return view('lang.show',[
            'lang' => $lang
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lang $lang)
    {
        $filials = Filial::latest()->get()->pluck('name','id');
        return view('lang.edit',[
            'lang' => $lang,
            'filials' => $filials,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lang $lang)
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
        $lang->update($request->all());
        return redirect()->route('lang.index')->with('success','Lang Edit Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lang $lang)
    {
        $lang->delete();
        return redirect()->route('lang.index')->with('success','Lang delete successfuly');
    }
}
