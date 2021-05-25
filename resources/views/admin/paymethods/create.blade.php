@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">{{ (isset($paymethods)? 'Edit Payment Method' : 'New Payment Method') }}</div>

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

                        <form action="{{ isset($paymethods)?route('admin.paymethods.update',$paymethods) : route('admin.paymethods.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="bank_name">Bank Name</label>
                                <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Enter bank name" value="{{isset($paymethods) ?  $paymethods->bank_name : ''}}" required>
                            </div>
                            <div class="form-group">
                                <label for="bank_no">Bank Number</label>
                                <input type="text" class="form-control" id="bank_no" name="bank_no" placeholder="Enter bank number" value="{{isset($paymethods) ?  $paymethods->bank_no : ''}}" required>
                            </div>
                            <div class="form-group">
                                <label for="method">Method</label>
                                <input type="text" class="form-control" id="method" name="method" placeholder="Enter method" value="{{isset($paymethods) ?  $paymethods->method : ''}}" required>
                            </div>
                          
                            <button class="btn btn-success">Add Paymethod</button>

                        </form>         
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection