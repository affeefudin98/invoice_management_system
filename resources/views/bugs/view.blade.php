@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card">
                    <div class="card-header">
                        {{-- {{ (isset($invoice) ? 'Edit Invoice' : 'New Invoice') }} --}}
                         Invoice {{$invoice->id}}
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

                        
                        <form action="#" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="date_created">Date Created:</label>
                                <input type="date" class="form-control" id="date_created" name="date_created" value="{{ $invoice->date_created }}">
                            </div>
                            <div class="form-group">
                                <label for="due_date">Due Date:</label>
                                <input type="date" class="form-control" id="due_date" name="due_date" value="{{ $invoice->due_date }}">
                            </div>
                            <div class="form-group">
                                <label for="sender_id">From:</label>
                               <select name="sender_id" id="sender_id" class="form-control">
                                   
                                    <option value="{{ $invoice->sender->id }}"> {{ $invoice->sender->name }} </option>
                                   
                               </select>
                            </div>
                            <div class="form-group">
                                <label for="receiver_id">To:</label>
                               <select name="receiver_id" id="receiver_id" class="form-control">
                                    <option value="{{ $invoice->receiver->id }}"> {{ $invoice->receiver->name }} </option>
                               </select>
                            </div>

                            {{-- <div class="form-group">
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
                            </div> --}}
                            <button class="btn btn-success">Create Invoice</button>

                        </form>  

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 


