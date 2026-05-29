<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
          <h1>Tasks</h1>

            <ul>
                @foreach($tasks as $task)
                <li> {{ $task['name'] }} - {{ $task['status'] }}
                <a href="/tasks/complete/{{ $task['name'] }}"> Mark Complete</a>
                </li>
                @endforeach
            </ul>



  </body>
</html>
