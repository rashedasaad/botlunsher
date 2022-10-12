<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if (!Session::get('user_session'))


    <form action="{{ route("login") }}" method="POST">
        @csrf
        <input type="text" name="username_or_email">
        <input type="password" name="password">
        <input type="submit" >

    </form>
    @else
    <script>window.location = "/";</script>
    <?php header("LOCATION: http://127.0.0.1:8000/") ?>

    @endif


</body>
</html>
