<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width='device-width', initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route("passback") }}" method="post">
        @csrf
        <input type="password" name="password" placeholder="password">
        <input type="password" name="rePassword"  placeholder="rePassword">
        <input type="text" name="verify_code"  placeholder="verify_code">
        <input type="hidden" value="{{ $path }}" name="path">
        <input type="submit">
    </form>
    
</body>
</html>