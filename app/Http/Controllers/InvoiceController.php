<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Company;
use App\Models\Product;
use App\Models\Paymethod;

class InvoiceController extends Controller
{
    public function index()
    {
        return view('invoices.index')->with('invoices', Invoice::all());
    }


    public function create()
    {
        return view('invoices.create')
        ->with('companies', Company::all())
        ->with('products', Product::all())
        ->with('paymethods', Paymethod::all());
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'date_created' => 'required',
            'due_date'=>'required'
        ]);

        auth()->user()->invoices()->create([
            'date_created'=>$request->date_created,
            'due_date'=>$request->due_date
        ]);

        session()->flash('success', 'Invoice created and send to client successfully.');

        return redirect('/invoices');
        
    }
}
