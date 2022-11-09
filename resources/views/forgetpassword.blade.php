<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{env("APP_NAME")}}</title>
    <!-- all.min.css -->
    <link rel="stylesheet" href="{{ URL::asset('css/all.min.css') }}">
    <!-- style.css -->
    <link rel="stylesheet" href="{{ URL::asset('css/Forget.css') }}">
    <!-- Font-Googel -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,500;1,500&family=Open+Sans:ital,wght@0,600;1,500;1,600&display=swap"
        rel="stylesheet">
</head>

<body>


    <div class="forget">
        <div class="continer">
            <div class="text">
                <h1>Forget <span>Password</span></h1>
            </div>
            <div class="forget_Form">
                <form class="main-form" action="{{ route("forgetpasswordstore")}}" method="POST">
                        @csrf
                    <p>
                        <input class="username-input" placeholder="email" type="email" name="email" id="username">
                    </p>
                    <div class="button">
                        <input type="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script></script>
</body>

</html>