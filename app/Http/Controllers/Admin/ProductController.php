<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use PDF;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index')->with('products', Product::all());
    }


    public function create()
    {
        return view('admin.products.create');
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

        return redirect('/admin/products');
        
    }

    public function pdfview(Request $request)
    {
        $products = Product::all(); 
       
        //load path 
        $pdf = PDF::loadView('admin.products.pdf',compact('products')); 
        //name of download file 
        return $pdf->download('ListProducts.pdf');
        //return $pdf->stream();

        // For send by email, I use :
        // $file = PDF::loadView('invoices', $data)->stream(); $message->attachData($file, $filename, [ 'mime' => 'application/pdf', ]);

    }

    public function edit(Product $products)
    {
        return view('admin.products.create')->with('products', $products);
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

        return redirect('/admin/products');
    }

    public function destroy(Product $product)
    {
        $product -> delete();

        session()->flash('success', 'Product deleted successfully.');

        return redirect('/admin/products');
    }
}
