<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paymethod;
use PDF;
use Auth;

class PaymethodController extends Controller
{
    public function index()
    {
        return view('client.paymethods.index')->with('paymethods', auth()->user()->paymethods);
    }


    public function create()
    {
        return view('client.paymethods.create');
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

        return redirect('/client/paymethods');
        
    }

    public function pdfview(Request $request)
    {
        $paymethods = Auth::user()->paymethods; 
       
        //load path 
        $pdf = PDF::loadView('client.paymethods.pdf',compact('paymethods')); 
        //name of download file 
        return $pdf->download('ListPayMethods.pdf');
        //return $pdf->stream();

        // For send by email, I use :
        // $file = PDF::loadView('invoices', $data)->stream(); $message->attachData($file, $filename, [ 'mime' => 'application/pdf', ]); 
    }

    public function edit(Paymethod $paymethods)
    {
        return view('client.paymethods.create')->with('paymethods', $paymethods);
    }

    public function update(Request $request, Paymethod $paymethods)
    {
        $this->validate(request(), [
            'bank_name' => 'required',
            'bank_no'=>'required|numeric',
            'method'=>'required'
        ]);

        $data=$request->all();

        $paymethods->bank_name = $data['bank_name']; 
        $paymethods->bank_no = $data['bank_no']; 
        $paymethods->method = $data['method']; 

        $paymethods->update($data);
        session()->flash('success', 'Payment Method updated successfully.');

        return redirect('/client/paymethods');
    }

    public function destroy(Paymethod $paymethod)
    {
        $paymethod -> delete();

        session()->flash('success', 'Paymethod deleted successfully.');

        return redirect('/client/paymethods');
    }

}
