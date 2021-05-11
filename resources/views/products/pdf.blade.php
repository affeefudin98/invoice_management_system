<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table id=products class="table table-bordered">
    <thead>
      <tr>
        <td><b>Name</b></td>
        <td><b>Description</b></td>
        <td><b>Price</b></td>     
      </tr>
      </thead>
      <tbody>
          @foreach ($products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->price}}</td>
            </tr>   
          @endforeach
      </tbody>
    </table>
  </body>
</html>