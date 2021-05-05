<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paymethod;

class PaymethodController extends Controller
{
    public function index()
    {
        return view('paymethods.index')->with('paymethods', Paymethod::all());
    }


    public function create()
    {
        return view('paymethods.create');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'bank_name' => 'required',
            'bank_no'=>'required|numeric',
            'method'=>'required'
        ]);

        auth()->user()->paymethods()->create([
            'bank_name'=>$request->bank_name,
            'bank_no'=>$request->bank_no,
            'method'=>$request->method
        ]);

        session()->flash('success', 'Payment Method created successfully.');

        return redirect('/paymethods');
        
    }
}
