  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title></title>
    </head>
    <body>

      <h1>Products</h1>

  <table border="1" cellpadding="10">
      <tr>
          <th>Name</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Total</th>
      </tr>

      @foreach($products as $product)
          <tr>
              <td>{{ $product['name'] }}</td>
              <td>{{ $product['price'] }}</td>
              <td>{{ $product['quantity'] }}</td>
              <td>{{ $product['total'] }}</td>
          </tr>
      @endforeach

      <!-- TOTAL ROW (outside loop) -->
      <tr>
          <td colspan="3"><strong>Total Revenue</strong></td>
          <td><strong>{{ $grandTotal }}</strong></td>
      </tr>

  </table>
    </body>
  </html>
