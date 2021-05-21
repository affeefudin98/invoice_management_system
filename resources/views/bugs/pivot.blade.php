@extends('layouts.main')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <table>
            <thead>
                <tr>
                    <th>invoice</th>
                    <th>product</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->id }}</td>
                    <td>
                        @foreach ($invoice->products as $product)
                            {{ $product->name }} ({{ $product->pivot->created_at }})
                            
                        @endforeach
                    </td>
                </tr>
                    
                @endforeach
            </tbody>
        </table>
        {{-- <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Invoice</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
              </tr>
            </thead>
            <tbody> 
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
              </tr>
            </tbody>
          </table> --}}
    </div>
</div>
@endsection
    


