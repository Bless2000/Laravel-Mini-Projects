<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
        <h1>My Cart</h1>

          <ul>
              @foreach($cart as $cartItem)
                <li>
                    {{ $cartItem }}  <a href="/cart/removeItem/{{ $cartItem }}"> Remove</a>
                </li>
                @endforeach
          </ul>

          <p>Total Cart items</p><br>
            <p>{{ $cartTotal }}</p>

            <h3>Add item</h3>
            <ul>
                  <li>
                      <a href="/cart/addItem/Tissues"> Tissues </a>
                  </li>

                  <li>
                      <a href="/cart/addItem/Books"> Books </a>
                  </li>

                  <li>
                      <a href="/cart/addItem/Controller"> Controller </a>
                  </li>
            </ul>

  </body>
</html>
