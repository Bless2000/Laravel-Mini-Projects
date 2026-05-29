<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
        <h1>Students</h1>

        <ul>
  @foreach($students1 as $stud)
      <li>
          {{ $stud }}
          <a href="/students1/find/{{ $stud }}" style="color: blue;"> [View Profile]</a> |

          <a href="/students1/removeStudent/{{ $stud }}" style="color: red;"> [Remove]</a>
      </li>
  @endforeach
</ul>

          <p>Total Numbr of Students -  {{ $totalStudents }}</p>

          <h3>Add Student</h3>

          <ul>
              <li>
                  Kwadwo <a href="/students1/addStudent/Kwadwo">Add</a>
              </li>

              <li>
                  Esi <a href="/students1/addStudent/Esi">Add</a>
              </li>

              <li>
                  Konadu <a href="/students1/addStudent/Konadu">Add</a>
              </li>
          </ul>

  </body>
</html>
