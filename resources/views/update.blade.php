F
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route("update")}}" method="POST">
        @csrf
        <input type="text" name="username" placeholder="username">
        <input type="password" name="last_password" placeholder="last_password">
        <input type="password" name="password" placeholder="password">
        <input type="password" name="rePasswrod" placeholder="rePasswrod">
        <input type="text" name="email" placeholder="email">
        <input type="submit" >

    </form>

</body>
</html>
