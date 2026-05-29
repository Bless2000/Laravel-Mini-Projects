<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
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
