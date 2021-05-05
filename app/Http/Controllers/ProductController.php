<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index')->with('products', Product::all());
    }


    public function create()
    {
        return view('products.create');
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

        return redirect('/products');
        
    }
}
