<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

            <h1>Students</h1>

            @foreach($students as $student)
              <p>{{ $student }}</p>
            @endforeach

            <p>Total Number of students = {{ $total }}</p>

            @foreach($caps as $cap)
    <p>{{ $cap }}</p>
@endforeach
  </body>
</html>
