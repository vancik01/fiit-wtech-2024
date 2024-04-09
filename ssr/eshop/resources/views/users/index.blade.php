<!DOCTYPE html>
<html>
<head>
  <title>Users</title>
</head>
<body>
  <h1>Users</h1>
  <ul>
    <table>
      <tr><th>ID</th><th>Meno</th><th>Email</th></tr>
      @foreach($usersList as $user)
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
      </tr>
      @endforeach
    </table>
  </ul>
</html>