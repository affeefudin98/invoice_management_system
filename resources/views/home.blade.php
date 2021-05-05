@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">   
        <div class="col-md-8">  
            <div class="card">
                <div class="card-header">{{ __('INVOICE MANAGEMENT SYSTEM') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} <br>

                    <a href="{{ route('companies.index') }}" class="btn btn-success">Add Company</a>
                    <a href="{{ route('products.index') }}" class="btn btn-success">Add Product</a>
                    <a href="{{ route('paymethods.index') }}" class="btn btn-success">Add Payment Details</a>
                    <a href="{{ route('invoices.index') }}" class="btn btn-success">Generate Invoice</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


