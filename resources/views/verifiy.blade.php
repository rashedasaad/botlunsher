<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route("verifiy") }}" method="POST">
        @csrf
        <input type="text" name="code">
        <input type="hidden" name="code_link" value="<?php echo $code_link?>">
        <input type="submit">
    </form>
</body>
</html>