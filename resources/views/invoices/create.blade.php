@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">{{ __('NEW INVOICE') }}</div>

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

                        <form action="{{ route('invoices.store') }}" method="POST">
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
                                <label for="sender">From:</label>
                               <select name="sender" id="sender" name="sender" class="form-control">
                                   @foreach ($companies as $company)
                                       <option value="{{ $company->id }}"> {{ $company->name }} </option>
                                   @endforeach
                               </select>
                            </div>
                            <div class="form-group">
                                <label for="receiver">To:</label>
                               <select name="receiver" id="receiver" name="receiver" class="form-control">
                                   @foreach ($companies as $company)
                                       <option value="{{ $company->id }}"> {{ $company->name }} </option>
                                   @endforeach
                               </select>
                            </div>
                            <div class="form-group">
                                <label for="product_id">Add Item:</label>
                                <select name="product_id" id="" class="form-control">
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}"> {{ $product->name }} </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity">
                            </div> --}}

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
                                <select name="paymethod_id" id="" class="form-control">
                                    @foreach ($paymethods as $paymethod)
                                        <option value="{{ $paymethod->id }}"> {{ $paymethod->bank_name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-success">Create Invoice</button>

                        </form>         
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection