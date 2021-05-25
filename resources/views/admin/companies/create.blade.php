@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">{{ (isset($companies)? 'Edit Company' : 'New Company') }}</div>
                   
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

                        <form action="{{ isset($companies)?route('admin.companies.update',$companies) : route('admin.companies.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter company name" value="{{isset($companies)? $companies->name : ''}}" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" value="{{isset($companies)? $companies->address : ''}}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{isset($companies)? $companies->email : ''}}" required>
                            </div>
                            <div class="form-group">
                                <label for="contact">Contact</label>
                                <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter contact number" value="{{isset($companies)? $companies->contact : ''}}" required>
                            </div>
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="text" class="form-control" id="website" name="website" placeholder="Enter website if exist" value="{{isset($companies)? $companies->website : ''}}">
                            </div>
                            <div class="form-group">
                                <label for="PIC_name">PIC Name</label>
                                <input type="text" class="form-control" id="PIC_name" name="PIC_name" placeholder="Enter PIC name" value="{{isset($companies)? $companies->PIC_name : ''}}">
                            </div>
                            <div class="form-group">
                                <label for="PIC_id">PIC ID</label>
                                <input type="text" class="form-control" id="PIC_id" name="PIC_id" placeholder="Enter PIC id" value="{{isset($companies)? $companies->PIC_id : ''}}">
                            </div>
                            <button class="btn btn-success">{{ (isset($companies)? 'Update Company' : 'Add Company') }}</button>

                        </form>         
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection