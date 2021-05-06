<?php

namespace App\Http\Controllers;
use App\Models\Company;
use PDF;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        return view('companies.index')->with('companies', Company::all());
    }


    public function create()
    {
        return view('companies.create');
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

        return redirect('/companies');
        
    }

    public function pdfview(Request $request)
    {
        $data = Company::all();

        // share data to view
        view()->share('companies',$data);
        PDF::setOptions(['dpi'=>'150', 'defaultFault' => 'sans-senrif']);
        $pdf = PDF::loadView('pdf_view', $data);
  
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }

}
