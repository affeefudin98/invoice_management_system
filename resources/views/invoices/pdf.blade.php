<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table id=invoices class="table table-bordered">
    <thead>
      <tr>
        <th>From</th>
        <th>To</th>
        <th>Paymethod</th>
        <th>Note</th>
        <th>Term</th>
        <th>Date created</th>
        <th>Due date</th>   
      </tr>
      </thead>
      <tbody>
          @foreach ($invoices as $invoice)
            <tr>
                <td>{{$invoice->sender}}</td>
                <td>{{$invoice->receiver}}</td>
                <td>{{$invoice->paymethod->bank_name }}</td>
                <td>{{$invoice->note}}</td>
                <td>{{$invoice->term}}</td>
                <td>{{$invoice->date_created}}</td>
                <td>{{$invoice->due_date}}</td>
            </tr>   
          @endforeach
      </tbody>
    </table>
  </body>
</html>