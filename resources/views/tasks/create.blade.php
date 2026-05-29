
    <!DOCTYPE html>
    <html lang="en" dir="ltr">
      <head>
        <meta charset="utf-8">
        <title></title>
      </head>
      <body>
        <form action="/tasks" method="POST">
                @csrf
                @if($errors->any())
                    <div>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <input type="text" name="title" placeholder="Task Title">
                <textarea name="description" placeholder="Task Description"></textarea>
                <button type="submit">Create Task</button>
            </form>
      </body>
    </html>
