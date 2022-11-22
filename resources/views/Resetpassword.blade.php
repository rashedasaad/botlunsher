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
    <link rel="stylesheet" href="{{ URL::asset('scss/reset/reset.css') }}">
    <!-- Font-Googel -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,500;1,500&family=Open+Sans:ital,wght@0,600;1,500;1,600&display=swap"
        rel="stylesheet">
</head>

<body>


    <!--  -->
    <div class="effect_container">
        <div class="effect">
            <span class="soft1" style="--i:5;"></span>
            <span style="--i:10;"></span>
            <span style="--i:20;"></span>
            <span class="soft1" style="--i:15;"></span>
            <span style="--i:19;"></span>
            <span style="--i:7;"></span>
            <span class="soft1" style="--i:20;"></span>
            <span style="--i:12;"></span>
            <span style="--i:8;"></span>
            <span class="soft1" style="--i:30;"></span>
            <span style="--i:20;"></span>
            <span style="--i:10;"></span>
            <span class="soft1" style="--i:21;"></span>
            <span style="--i:5;"></span>
            <span style="--i:10;"></span>
            <span class="soft1" style="--i:17;"></span>
            <span style="--i:11;"></span>
            <span style="--i:27;"></span>
            <span class="soft1" style="--i:11;"></span>
            <span style="--i:10;"></span>
            <span style="--i:20;"></span>
            <span class="soft1" style="--i:15;"></span>
            <span style="--i:19;"></span>
            <span style="--i:7;"></span>
            <span class="soft1" style="--i:20;"></span>
        </div>
    </div>
    <!--  -->


    <div class="reset">
        <div class="continer">
            <div class="text">
                <h1>Reset <span>Password</span></h1>
            </div>
            <div class="Reset_Form">
                <form action="http://127.0.0.1:8000/store/passback/{{$path}}" method="POST">
                    @csrf
                <p>
                    <input class="input-box" type="password" placeholder="password" name="password" id="password">
                </p>
                <p>
                    <input class="input-box" type="Password" placeholder="Confirm Password" name="rePassword"
                        id="confirm-password">
                </p>

                <p>
                    <input class="input-box" type="number" placeholder="verify code" name="verify_code">
                </p>

                <div class="btnnu">
                    <input class="btn" type="submit" name="reset-btn" id="reset-btn" value="Reset Password">
                </div>
            </form>
            </div>
        </div>
    </div>

    <script>
        const effect = document.querySelector(`.effect`).children;
        const span = document.querySelectorAll(`.effect_container .effect span`);

        const width = ['200px', '300px', '400px', '200px', '300px', '400px', '400px', '300px', '200px', '400px', '300px', '200px', '400px', '300px', '200px', '400px', '300px', '200px', '400px', '300px', '200px', '400px', '300px', '200px'];
        for (eff of effect) {
            let ran = Math.trunc(Math.random() * 300) + 'px';
            eff.style.width = ran;
            eff.style.height = ran;
        }
    </script>
</body>

</html>