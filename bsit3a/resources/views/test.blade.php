<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
          <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as  $employee)
                    <tr>
                        <td>{{ $employee->id}}</td>
                        <td>{{ $employee->email}}</td>
                    </tr>
                @endforeach
            </tbody>

          </table>
</body>
</html>
