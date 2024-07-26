<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if (session()->has('errors'))
    {{ session('errors') }}
    @endif
    <form action="/auth/update/12345" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="Gian Sonia">
        <input type="email" name="email" value="giansonia555@gmail.com">
        <input type="password" name="password" value="12345678">
        <input type="text" name="role" value="ADMIN">
        <button type="submit">Login</button>
    </form>
</body>
</html>
