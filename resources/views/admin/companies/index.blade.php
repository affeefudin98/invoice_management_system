@extends('layouts.main')

@section('content')
<html lang="en">

    <body class="nav-fixed">

        <main>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

            <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                <div class="container">
                    <div class="page-header-content pt-4">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto mt-4">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><i data-feather="activity"></i></div>
                                    Companies
                                </h1>
                                <div class="page-header-subtitle">List of companies</div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Main page content-->
            <div class="container mt-n10">
                <!-- Example DataTable for Dashboard Demo-->
                <div class="card mb-4">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="{{ route('admin.companies.create') }}" class="btn btn-success mb-3">Create New Company</a>

                        <div class="datatable">
                            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NAME</th>
                                        <th>ADDRESS</th>
                                        <th>EMAIL</th>
                                        <th>CONTACT</th>
                                        <th>WEBSITE</th>
                                        <th>PIC NAME</th>
                                        <th>PIC ID</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($companies as $company)
                                    <tr>
                                        <td>{{ $company->id }}</td>
                                        <td>{{ $company->name }}</td>
                                        <td>{{ $company->address }}</td>
                                        <td>{{ $company->email }}</td>
                                        <td>{{ $company->contact }}</td>
                                        <td>{{ $company->website }}</td>
                                        <td>{{ $company->PIC_name }}</td>
                                        <td>{{ $company->PIC_id }}</td>
                                        <td>
                                            <a href="{{ route('admin.companies.edit', $company->id) }}" class="btn btn-warning btn-sm float-end">Edit</a><br>
                                            <a href="{{ route('admin.companies.destroy', $company->id) }}" class="btn btn-danger btn-sm float-end">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <a class="btn btn-primary" href="{{ route('admin.companies.pdf') }}">Export to PDF</a>
                    </div>
                </div>
            </div>
        </main>
    
    </body>
</html>
@endsection