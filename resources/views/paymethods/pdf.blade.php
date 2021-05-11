<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table id=paymethods class="table table-bordered">
    <thead>
      <tr>
        <td><b>Bank Name</b></td>
        <td><b>Bank Number</b></td>
        <td><b>Method</b></td>     
      </tr>
      </thead>
      <tbody>
          @foreach ($paymethods as $paymethod)
            <tr>
                <td>{{$paymethod->bank_name}}</td>
                <td>{{$paymethod->bank_no}}</td>
                <td>{{$paymethod->method}}</td>
            </tr>   
          @endforeach
      </tbody>
    </table>
  </body>
</html>