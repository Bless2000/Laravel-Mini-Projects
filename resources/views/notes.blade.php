<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

          <h1>Notes</h1>

            @foreach($notes as $note)
              <li>{{ $note }}</li>
            @endforeach

            <h2>Add Note</h2>

            <a href="/notes/addNote/Take a nap"> Take a nap</a>
            <a href="/notes/addNote/learn Laravel"> Learn laravel</a>

  </body>
</html>
