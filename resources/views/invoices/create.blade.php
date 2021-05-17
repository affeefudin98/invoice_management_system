@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card">
                    <div class="card-header">
                        {{ (isset($invoice) ? 'Edit Invoice' : 'New Invoice') }}
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="list-group">
                                    @foreach ($errors->all() as $error)
                                        <li class="list-group-item text-danger">
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                         @endif

                        {{-- <form action="{{ route('invoices.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="date_created">Date Created:</label>
                                <input type="date" class="form-control" id="date_created" name="date_created">
                            </div>
                            <div class="form-group">
                                <label for="due_date">Due Date:</label>
                                <input type="date" class="form-control" id="due_date" name="due_date">
                            </div>
                            <div class="form-group">
                                <label for="sender_id">From:</label>
                               <select name="sender_id" id="sender_id" class="form-control">
                                   @foreach ($companies as $company)
                                       <option value="{{ $company->id }}"> {{ $company->name }} </option>
                                   @endforeach
                               </select>
                            </div>
                            <div class="form-group">
                                <label for="receiver_id">To:</label>
                               <select name="receiver_id" id="receiver_id" class="form-control">
                                   @foreach ($companies as $company)
                                       <option value="{{ $company->id }}"> {{ $company->name }} </option>
                                   @endforeach
                               </select>
                            </div>

                            <div class="form-group">
                                <label for="product_id">Add Item:</label>
                                <select name="product_id" id="product_id" class="form-control">
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}"> {{ $product->name }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity">
                            </div>

                            <div class="form-group">
                                <label for="note">Notes:</label><br>
                                <textarea name="note" id="note" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="term">Terms:</label><br>
                                <textarea name="term" id="term" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="paymethod_id">Add Paymenthod:</label>
                                <select name="paymethod_id" id="paymethod_id" class="form-control">
                                    @foreach ($paymethods as $paymethod)
                                        <option value="{{ $paymethod->id }}"> {{ $paymethod->bank_name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-success">Create Invoice</button>

                        </form>          --}}

                        <form action="{{ route('invoices.store') }}" method="POST">
                            @csrf
                            
                            <div class="card-header p-4 p-md-5 border-bottom-0 bg-gradient-primary-to-secondary text-white-50">
                                <div class="row justify-content-between align-items-center">  
                                    <div class="col-5 col-lg-auto text-center text-lg-left">
                                        <!-- Invoice details-->
                                        <div class="h3 text-white">New Invoice</div>
                                        Date Created:
                                        <input type="date" class="form-control" id="date_created" name="date_created" value="{{ isset($invoice) ? $invoice->date_created : '' }}"> 
                                    </div>
                                    <div class="col-5 col-lg-auto text-center text-lg-left">
                                        <br>Due Date:<input type="date" class="form-control" id="due_date" name="due_date">
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="card-body p-4 p-md-5">
                                <!-- Invoice table-->
                                <div class="table-responsive">
                                    <table class="table table-borderless mb-0">
                                        <thead class="border-bottom">
                                            <tr class="small text-uppercase text-muted">
                                                <th scope="col">Item/Service & Description</th>
                                                <th class="text-right" scope="col">Quantity</th>
                                                <th class="text-right" scope="col">Discount</th>
                                                <th class="text-right" scope="col">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Invoice item 1-->
                                            <tr class="border-bottom">
                                                <td>
                                                    <div class="font-weight-bold">
                                                        <select name="product_id" id="product_id" class="form-control">
                                                            @foreach ($products as $product)
                                                                <option value="{{ $product->id }}"> {{ $product->name }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </td>
                                                <td class="text-right font-weight-bold">
                                                    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity">
                                                </td>
                                                <td class="text-right font-weight-bold">$50.00</td>
                                                <td class="text-right font-weight-bold">$600.00</td>
                                            </tr>
                                            <!-- Invoice item 2-->
                                            <tr class="border-bottom">
                                                <td>
                                                    <div class="font-weight-bold">SB UI Kit Pro</div>
                                                    <div class="small text-muted d-none d-md-block">A UI toolkit for creating marketing websites and landing pages</div>
                                                </td>
                                                <td class="text-right font-weight-bold">15</td>
                                                <td class="text-right font-weight-bold">$55.00</td>
                                                <td class="text-right font-weight-bold">$825.00</td>
                                            </tr>
                                            <!-- Invoice item 3-->
                                            <tr class="border-bottom">
                                                <td>
                                                    <div class="font-weight-bold">Pro HTML Bundle</div>
                                                    <div class="small text-muted d-none d-md-block">A fully coded set of UI resources for creating a comprehensive web application</div>
                                                </td>
                                                <td class="text-right font-weight-bold">4</td>
                                                <td class="text-right font-weight-bold">$125.00</td>
                                                <td class="text-right font-weight-bold">$500.00</td>
                                            </tr>
                                            <!-- Invoice subtotal-->
                                            <tr>
                                                <td class="text-right pb-0" colspan="3"><div class="text-uppercase small font-weight-700 text-muted">Subtotal:</div></td>
                                                <td class="text-right pb-0"><div class="h5 mb-0 font-weight-700">$,1925.00</div></td>
                                            </tr>
                                            <!-- Invoice tax column-->
                                            <tr>
                                                <td class="text-right pb-0" colspan="3"><div class="text-uppercase small font-weight-700 text-muted">Tax (7%):</div></td>
                                                <td class="text-right pb-0"><div class="h5 mb-0 font-weight-700">$134.75</div></td>
                                            </tr>
                                            <!-- Invoice total-->
                                            <tr>
                                                <td class="text-right pb-0" colspan="3"><div class="text-uppercase small font-weight-700 text-muted">Total Amount Due:</div></td>
                                                <td class="text-right pb-0"><div class="h5 mb-0 font-weight-700 text-green">$2059.75</div></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer p-4 p-lg-5 border-top-0">
                                <div class="row">
                                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                                        <!-- Invoice - sent to info-->
                                        <div class="small text-muted text-uppercase font-weight-700 mb-2">To</div>
                                        <div class="h6 mb-1">
                                            <select name="receiver_id" id="receiver_id" class="form-control">
                                                @foreach ($companies as $company)
                                                    <option value="{{ $company->id }}"> {{ $company->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                                        <!-- Invoice - sent from info-->
                                        <div class="small text-muted text-uppercase font-weight-700 mb-2">From</div>
                                        <div class="h6 mb-0">
                                            <select name="sender_id" id="sender_id" class="form-control">
                                                @foreach ($companies as $company)
                                                    <option value="{{ $company->id }}"> {{ $company->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <!-- Invoice - additional notes-->
                                        <div class="small text-muted text-uppercase font-weight-700 mb-2">Note</div>
                                        <div class="small mb-0">
                                            <textarea name="note" id="note" cols="30" rows="5" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="row">
                                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                                        <!-- Invoice - sent from info-->
                                        <div class="small text-muted text-uppercase font-weight-700 mb-2">Payment Method</div>
                                        <div class="h6 mb-0">
                                            <select name="paymethod_id" id="paymethod_id" class="form-control">
                                                @foreach ($paymethods as $paymethod)
                                                    <option value="{{ $paymethod->id }}"> {{ $paymethod->bank_name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <!-- Invoice - term-->
                                        <div class="small text-muted text-uppercase font-weight-700 mb-2">Term</div>
                                        <div class="small mb-0">
                                            <textarea name="term" id="term" cols="30" rows="5" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success">Create Invoice</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 


