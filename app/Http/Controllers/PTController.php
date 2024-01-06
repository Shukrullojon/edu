<?php

namespace App\Http\Controllers;

use App\Models\PC;
use App\Models\PT;
use App\Models\PU;
use Illuminate\Http\Request;

class PTController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pts = PT::select('id','question','a','b','c','d','answer','p_c_id');
        if (isset($request->question)){
            $pts->where('question','LIKE','%'.$request->question.'%');
        }
        if (isset($request->category_id)){
            $pts->where('p_c_id',$request->category_id);
        }
        $pts = $pts->latest()->paginate(20);
        $categories = PC::all()->pluck('name','id');
        return view('pt.index',[
            'pts' => $pts,
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pcs = PC::latest()->get()->pluck('name','id');
        return view('pt.create',[
            'pcs' => $pcs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'question' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'answer' => 'required',
            'p_c_id' => 'required',
        ]);
        PT::create($request->all());
        return redirect()->route('pt.index')->with('success','Placement Test created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pt = PT::find($id);
        return view('pt.show',[
            'pt' => $pt,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pcs = PC::get()->pluck('name','id');
        $pt = PT::find($id);
        return view('pt.edit',[
            'pt' => $pt,
            'pcs' => $pcs,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'question' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'answer' => 'required',
            'p_c_id' => 'required',
        ]);
        $pt = PT::find($id);
        $pt->update($request->all());
        return redirect()->route('pt.index')
            ->with('success','Placement Test updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PT::where('id',$id)->delete();
        return redirect()->route('pt.index')
            ->with('success','Placement Test deleted successfully');
    }

    public function results(Request $request){
        $pus = PU::select('p_u.id', 'p_u.user_id','p_u.p_c_id','p_u.attach_user_id','p_u.spend_time','p_u.start_time','p_u.status');
        if (isset($request->name)){
            $pus->join('users','p_u.user_id','=','users.id');
            $pus->where('users.name','LIKE','%'.$request->name.'%');
        }
        if (isset($request->category_id)){
            $pus->where('p_u.p_c_id',$request->category_id);
        }

        $pus = $pus->latest('p_u.created_at')->paginate(40);
        $categories = PC::all()->pluck('name','id');
        return view('pt.result',[
            'pus' => $pus,
            'categories' => $categories,
        ]);
    }

}
