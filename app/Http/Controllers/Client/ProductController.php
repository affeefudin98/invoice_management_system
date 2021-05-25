<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use PDF;
use Auth;

class ProductController extends Controller
{
    public function index()
    {
        return view('client.products.index')->with('products', auth()->user()->products);
    }


    public function create()
    {
        return view('client.products.create');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'name'=>'required',
            'price'=>'required|numeric'
        ]);

        auth()->user()->products()->create([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price
        ]);

        session()->flash('success', 'Product added successfully.');

        return redirect('/client/products');
        
    }

    public function pdfview(Request $request)
    {
        $products = Auth::user()->products; 
       
        //load path 
        $pdf = PDF::loadView('client.products.pdf',compact('products')); 
        //name of download file 
        return $pdf->download('ListProducts.pdf');
        //return $pdf->stream();

        // For send by email, I use :
        // $file = PDF::loadView('invoices', $data)->stream(); $message->attachData($file, $filename, [ 'mime' => 'application/pdf', ]);

    }

    public function edit(Product $products)
    {
        return view('client.products.create')->with('products', $products);
    }

    public function update(Request $request, Product $products)
    {
        $this->validate(request(), [
            'name'=>'required',
            'price'=>'required|numeric'
        ]);

        $data=$request->all();

        $products->name = $data['name']; 
        $products->description = $data['description']; 
        $products->price = $data['price']; 

        $products->update($data);
        session()->flash('success', 'Product updated successfully.');

        return redirect('/client/products');
    }

    public function destroy(Product $product)
    {
        $product -> delete();

        session()->flash('success', 'Product deleted successfully.');

        return redirect('/client/products');
    }
}
