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
    <link rel="stylesheet" href="{{ URL::asset('css/reset.css') }}">
    <!-- Font-Googel -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,500;1,500&family=Open+Sans:ital,wght@0,600;1,500;1,600&display=swap"
        rel="stylesheet">
</head>

<body>

    <div class="reset">
        <div class="continer">
            <div class="text">
                <h1>Reset <span>Password</span></h1>
            </div>
            <div class="Reset_Form">
                <form action="{{ route("passback") }}" method="post">
                    @csrf
                <p>
                    <input class="input-box" type="password" placeholder="password" name="password" id="password">
                </p>
                <p>
                    <input class="input-box" type="password" placeholder="Confirm Password" name="rePassword"
                        id="confirm-password">
                </p>

                <p>
                    <input class="input-box" type="number" placeholder="verify code" name="verify_code">
                </p>

                <input type="hidden" value="{{ $path }}" name="path">
                <div class="btnnu">
                    <input class="btn" type="submit" name="reset-btn" id="reset-btn" value="Reset Password">
                </div>
              
            </form>
            </div>
        </div>
    </div>

    <script src="{{ URL::asset('js/menu.js') }}"></script>
</body>

</html>