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
                    <div class="card-header">{{ __('LIST OF INVOICE') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="{{ route('invoices.create') }}" class="btn btn-success">Create New Invoice</a>
                        
                       <div class="input-group">
                            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                              aria-describedby="search-addon" />
                            <button type="button" class="btn btn-outline-primary">search</button>
                        </div>
                      

                        <div class="datatable">
                            <table id="invoices" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        {{-- <th>Total Owed</th> --}}
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Paymethod</th>
                                        <th>Note</th>
                                        <th>Term</th>
                                        <th>Date created</th>
                                        <th>Due date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoices as $invoice)
                                    <tr>
                                        {{-- <td>{{ $invoice->products->total_price }}</td> --}}
                                        <td>{{ $invoice->sender->name }}</td>
                                        <td>{{ $invoice->receiver->name}}</td>
                                        <td>{{ $invoice->paymethod->bank_name }}</td>
                                        <td>{{ $invoice->note }}</td>
                                        <td>{{ $invoice->term }}</td>
                                        <td>{{ $invoice->date_created }}</td>
                                        <td>{{ $invoice->due_date }}</td>
                                        <td>
                                            <a href="{{ route('invoices.view', $invoice->id) }}" class="btn btn-primary btn-sm float-end">View</a><br>
                                            <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-warning btn-sm float-end">Edit</a><br>
                                            <a href="#" class="btn btn-danger btn-sm float-end">Delete</a>
                                        </td>
                                    </tr>
                                        
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <a class="btn btn-primary" href="{{ route('invoices.pdf') }}">Export to PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 