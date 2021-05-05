@extends('layouts.app')

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
                    <div class="card-header">{{ __('LIST OF PAYMENT METHOD') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="{{ route('paymethods.create') }}" class="btn btn-success">Add New Payment Method</a>
                        
                        {{-- <div class="input-group">
                            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                              aria-describedby="search-addon" />
                            <button type="button" class="btn btn-outline-primary">search</button>
                        </div> --}}
                      

                        <div class="datatable">
                            <table id="paymethods" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Bank Name</th>
                                        <th>Bank Number</th>
                                        <th>Method</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($paymethods as $paymethod)
                                    <tr>
                                        <td>{{ $paymethod->bank_name }}</td>
                                        <td>{{ $paymethod->bank_no }}</td>
                                        <td>{{ $paymethod->method }}</td>
                                    </tr>
                                        
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css" rel="stylesheet">

@endsection

@section('js')

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
    $('paymethods').DataTable();
} );
</script>
@endsection