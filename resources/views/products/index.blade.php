@extends('layouts.main')

@section('content')
    <div class="container">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card">
                    <div class="card-header">{{ __('LIST OF PRODUCT') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="{{ route('products.create') }}" class="btn btn-success">Add New Product</a>
                        
                        {{-- <div class="input-group">
                            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                              aria-describedby="search-addon" />
                            <button type="button" class="btn btn-outline-primary">search</button>
                        </div> --}}
                      

                        <div class="datatable">
                            <table id="products" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NAME</th>
                                        <th>DESCRIPTION</th>
                                        <th>PRICE (RM)</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>
                                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm float-end">Edit</a>
                                            <a href="{{ route('product.destroy', $product->id) }}" class="btn btn-danger btn-sm float-end">Delete</a>
                                        </td>
                                    </tr>
                                        
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <a class="btn btn-primary" href="{{ route('products.pdf') }}">Export to PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection