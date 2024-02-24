<?php

namespace App\Http\Controllers;

use App\Models\Filial;
use Illuminate\Http\Request;

class FilialController extends Controller
{
    public function index(Request $request)
    {
        $filials = Filial::select('id','name','address','phone','status','room_count');
        if (isset($request->name)){
            $filials->where('name','LIKE','%'.$request->name.'%');
        }
        if (isset($request->address)){
            $filials->where('address','LIKE','%'.$request->address.'%');
        }
        if (isset($request->phone)){
            $request->merge(
                ['phone' => str_replace(['(', ')', '-'], '', $request->phone)]
            );
            $filials->where('phone','LIKE','%'.$request->phone.'%');
        }
        if (isset($request->status)){
            $filials->where('status',$request->status);
        }
        if (isset($request->room_count)){
            $filials->where('room_count',$request->room_count);
        }
        $filials = $filials->latest()->paginate(20);
        return view('filial.index', [
            'filials' => $filials
        ]);
    }

    public function create()
    {
        return view('filial.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'address' => 'required|string|max:100',
            'phone' => 'required|string|max:13',
            'status' => 'required|numeric|in:0,1',
            'room_count' => 'required|integer|max:999|min:0'
        ]);
        $request->merge(
            ['phone' => str_replace(['(', ')', '-'], '', $request->phone)]
        );
        Filial::create($request->all());
        return redirect()->route('filial.index')->with('success', 'Filial created successfully');
    }

    public function show($id)
    {
        $filial = Filial::find($id);
        return view('filial.show', [
            'filial' => $filial,
        ]);
    }

    public function edit($id)
    {
        $filial = Filial::find($id);
        return view('filial.edit', [
            'filial' => $filial,
        ]);
    }

    public function update(Request $request, Filial $filial)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'address' => 'required|string|max:100',
            'phone' => 'required|string|max:13',
            'status' => 'required|numeric|in:0,1',
            'room_count' => 'required|integer|max:999|min:0'
        ]);
        $request->merge(
            ['phone' => str_replace(['(', ')', '-'], '', $request->phone)]
        );
        $filial->update($request->all());
        return redirect()->route('filial.index')
            ->with('success', 'Filial updated successfully');
    }

    public function destroy($id)
    {
        Filial::where('id', $id)->delete();
        return redirect()->route('filial.index')
            ->with('success', 'Filial deleted successfully');
    }

}
