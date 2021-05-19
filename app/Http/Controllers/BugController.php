<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Company;
use App\Models\Product;
use App\Models\Paymethod;

use Illuminate\Http\Request;

class BugController extends Controller
{
    public function index()
    {
        return view('bugs.index')->with('invoices', auth()->user()->invoices);
    }


    public function create()
    {
        return view('bugs.create')
        ->with('companies', auth()->user()->companies)
        ->with('products', auth()->user()->products)
        ->with('paymethods', auth()->user()->paymethods);
        // ->with('companies', Company::all())
        // ->with('products', Product::all())
        // ->with('paymethods', Paymethod::all());
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'date_created' => 'required',
            'due_date'=>'required',
            'sender_id'=>'required',
            'receiver_id'=>'required',
            'product_id'=>'required',
            'term'=>'required',
            'paymethod_id'=>'required'
        ]);

        auth()->user()->invoices()->create([
            'date_created'=>$request->date_created,
            'due_date'=>$request->due_date,
            'sender_id'=>$request->sender_id,
            'receiver_id'=>$request->receiver_id,
            'product_id'=>$request->product_id,
            'note'=>$request->note,
            'term'=>$request->term,
            'paymethod_id'=>$request->paymethod_id
        ]);

        /*if ($request->produts) {
            $invoice->products()->attach($request->products);
        }*/

        session()->flash('success', 'Invoice created successfully.');

        return redirect('/invoices');
        
    }

    Public function view(Invoice $invoice)
    {
        return view('bugs.view')
        ->with('invoice', $invoice);
        
    }

    public function pdfview(Request $request)
    {
        $invoice = auth()->user()->invoices; 
       
        //load path 
        $pdf = PDF::loadView('invoices.pdf',compact('invoices')); 
        //name of download file 
        return $pdf->download('ListInvoices.pdf');
        //return $pdf->stream();

        // For send by email, I use :
        // $file = PDF::loadView('invoices', $data)->stream(); $message->attachData($file, $filename, [ 'mime' => 'application/pdf', ]); 
    }

    public function edit(Invoice $invoices)
    {
        return view('invoices.edit') 
        ->with('invoices', $invoices)
        ->with('companies', auth()->user()->companies)
        ->with('products', auth()->user()->products)
        ->with('paymethods', auth()->user()->paymethods);
    }

    public function update(Request $request, Invoice $invoices)
    {
        $this->validate(request(), [
            'date_created' => 'required',
            'due_date'=>'required',
            'sender_id'=>'required',
            'receiver_id'=>'required',
            'product_id'=>'required',
            'term'=>'required',
            'paymethod_id'=>'required'
        ]);

        $data=$request->all();

        $invoices->date_created = $data['date_created'];
        $invoices->due_date = $data['due_date'];
        $invoices->sender_id = $data['sender_id'];
        $invoices->receiver_id = $data['receiver_id'];
        $invoices->product_id = $data['product_id'];
        $invoices->note = $data['note'];
        $invoices->term = $data['term'];
        $invoices->paymethod_id = $data['paymethod_id'];

        $invoices->update($data);

        session()->flash('success', 'Invoice updated successfully.');

        return redirect('/invoices');

    }
    // Public function view(Invoice $invoice)
    // {
    //     return view('invoices.view')
    //     ->with('invoice', $invoice)
    //     ->with('companies', auth()->user()->companies)
    //     ->with('products', auth()->user()->products)
    //     ->with('paymethods', auth()->user()->paymethods);
    // }

    // public function download(Request $request, Invoice $invoice)
    // {
    //     $invoice = Invoice::all(); 
       
    //     //load path 
    //     $pdf = PDF::loadView('invoices.view',compact('invoice')); 
    //     //return view('invoices.view', compact('invoice'));
    //     //name of download file 
    //     return $pdf->download('Invoice{invoice}.pdf');
    //     //return $pdf->stream();

    //     // For send by email, I use :
    //     // $file = PDF::loadView('invoices', $data)->stream(); $message->attachData($file, $filename, [ 'mime' => 'application/pdf', ]); 
    // }

    public function destroy(Invoice $invoice)
    {
        $invoice -> delete();

        session()->flash('success', 'Invoice deleted successfully.');

        return redirect('/invoices');
    }
}
