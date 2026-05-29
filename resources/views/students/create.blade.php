<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
</head>
<body>

                <h1>Student List</h1>

                <form action="/students" method="POST">
                @csrf
                @if($errors->any())
                    <div>
                            <ul>
                                <li>{{ $error }}</li>
                            </ul>

                    </div>
                @endif
                <input type="text" name="name" placeholder="Student Name">
                <input type="number" name="score" placeholder="Student Score">
                <button type="submit">Add Student</button>
            </form>
</body>
</html>
