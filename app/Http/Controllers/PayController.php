<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::latest()->paginate(20);
        $p_sum = Payment::where('status',1)->sum('percentage');
        return view('pay.index',[
            'payments' => $payments,
            'p_sum' => $p_sum,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('pay.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'percentage' => 'required',
        ]);
        Payment::create($request->all());
        return redirect()->route('payed.index')->with('success', 'Payment saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pay = Payment::where('id',$id)->first();
        return view('pay.show',[
            'pay' => $pay,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $payment = Payment::where('id',$id)->first();
        return view('pay.edit', [
            'payment' => $payment,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'percentage' => 'required',
        ]);
        $request->request->remove('_method');
        $request->request->remove('_token');
        $payment = Payment::where('id',$id)->first();
        $payment->update($request->all());
        return redirect()->route('payed.index')->with('success', 'Payment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Payment::where('id',$id)->update('status',0);
        return redirect()->route('payed.index')->with('success', 'Payment arxived successfully');
    }
}
