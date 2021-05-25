<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use App\Models\Company;
use PDF;
use Auth;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        return view('client.companies.index')->with('companies', auth()->user()->companies);
    }


    public function create()
    {
        return view('client.companies.create');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'name'=>'required',
            'address'=>'required',
            'contact'=>'required',
            'email'=>'required',
            'PIC_name'=>'required',
            'PIC_id'=>'required|numeric'          
        ]);

        auth()->user()->companies()->create([
            'name'=>$request->name,
            'address'=>$request->address,
            'contact'=>$request->contact,
            'email'=>$request->email,
            'website'=>$request->website,
            'PIC_name'=>$request->PIC_name,
            'PIC_id'=>$request->PIC_id
        ]);

        session()->flash('success', 'Company created successfully.');

        return redirect('/client/companies');
        
    }

    public function pdfview(Request $request)
    {
        $companies = Auth::user()->companies;
        
        //dd($companies);
        //load path 
        $pdf = PDF::loadView('client.companies.pdf',compact('companies')); 
        //name of download file 
        return $pdf->download('ListCompanies.pdf');
        //return $pdf->stream();

        // For send by email, I use :
        // $file = PDF::loadView('invoices', $data)->stream(); $message->attachData($file, $filename, [ 'mime' => 'application/pdf', ]);

        
    }

    public function edit(Company $companies)
    {
        return view('client.companies.create')->with('companies', $companies);
    }

    public function update(Request $request, Company $companies)
    {
        $this->validate(request(), [
            'name'=>'required',
            'address'=>'required',
            'contact'=>'required',
            'email'=>'required',
            'PIC_name'=>'required',
            'PIC_id'=>'required|numeric'          
        ]);

        $data=$request->all();

        $companies->name = $data['name']; 
        $companies->address = $data['address']; 
        $companies->contact = $data['contact']; 
        $companies->email = $data['email']; 
        $companies->PIC_name = $data['PIC_name']; 
        $companies->PIC_id = $data['PIC_id']; 

        $companies->update($data);
        session()->flash('success', 'Company edit successfully.');

        return redirect('/client/companies');
    }

    public function destroy(Company $company)
    {
        $company -> delete();

        session()->flash('success', 'Company deleted successfully.');

        return redirect('/client/companies');
    }

}
