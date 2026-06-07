<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
          @if(session('success'))
              <div style="background-color: #d4edda; color: #155724; padding: 10px; border: 1px solid #c3e6cb; margin-bottom: 20px;">
                  {{ session('success') }}
              </div>
          @endif
          <h1>Users</h1>

          @foreach($users as $user)
          <li>{{ $user }}</li>
          <a href="/users/delete/{{ $user }}">Delete user</a>
          @endforeach

          <h2>Add Users</h2>

          <a href="/users/add/Bless">Add Bless</a>
          <a href="/users/add/Kobby"> Add Kobby</a>
  </body>
</html>
