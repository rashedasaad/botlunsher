<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- all.min.css -->
    <link rel="stylesheet" href="{{ URL::asset('css/all.min.css') }}">
    <!-- style.css -->

    <!-- Font-Googel -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,600;0,700;1,600&display=swap"
        rel="stylesheet">
</head>
<style>
    * {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
        text-decoration: none;
        font-family: "Source Sans Pro", sans-serif;
    }

    html {
        scroll-behavior: smooth;
    }

    body {
        background-color: #222222;
    }

    .error {
        width: 100%;
        height: 100vh;
        z-index: 10;
        background-color: rgba(0, 0, 0, 0.5882352941);
    }

    .error .continer {
        width: 100%;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: space-around;
    }

    @media (max-width: 1326px) {
        .error .continer {
            flex-direction: column-reverse;
            justify-content: space-around;
            height: 0;
            position: absolute;
            top: 50%;
        }
    }

    .error .continer .taitel {
        margin-top: max(2.5vw, 2.5em);
    }

    .error .continer .taitel h1 {
        color: #00CE79;
        font-size: max(4vw, 4em);
    }

    .error .continer .taitel p {
        color: white;
        width: max(18vw, 18em);
        font-size: max(2vw, 2em);
    }

    .error .continer .error_404 {
        margin-bottom: max(2.5vw, 2.5em);
    }

    .error .continer .error_404 h1 {
        position: relative;
        color: white;
        font-size: max(11vw, 11em);
    }

    .error .continer .error_404 h1::before {
        position: absolute;
        content: "!";
        font-family: fontAwesome;
        top: max(-3vw, -3em);
        left: max(-10vw, -10em);
        border: max(0.1vw, 0.1em) solid rgba(0, 206, 121, 0.4);
        backdrop-filter: blur(20px);
        width: max(0.8vw, 0.8em);
        height: max(0.8vw, 0.8em);
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }

    @media (max-width: 1326px) {
        .error .continer .error_404 h1::before {
            top: -60px;
            left: -150px;
        }
    }

    .effect_container {
        position: absolute;
        width: 100%;
        height: 100vh;
        overflow: hidden;
        z-index: -10;
    }

    .effect_container .effect {
        position: relative;
        display: -webkit-box;
        transform: rotate(357deg);
        z-index: -1;
    }

    .effect_container .effect span {
        position: relative;
        width: 100px;
        height: 100px;
        display: block;
        filter: blur(4px);
        background-color: rgba(255, 255, 255, 0);
        margin: 0 4px;
        border-radius: 50%;
        box-shadow: 0 0 0 10px rgba(11, 11, 11, 0.27), inset 0 0 8px rgba(0, 0, 0, 0.3215686275), 0 0 100px #00ce79;
        animation: animat 6s cubic-bezier(0.01, 0.55, 1, 1) infinite;
        animation-duration: calc(400s / var(--i));
    }

    .effect_container .effect span:nth-child(even) {
        filter: blur(8px);
        backdrop-filter: blur(10px);
        background-color: rgba(0, 206, 121, 0.4705882353);
        border-radius: 50%;
        box-shadow: 0 0 0 10px rgba(11, 11, 11, 0.27), inset 0 0 8px rgba(0, 0, 0, 0.32), 0 0 100px #00ce79;
    }

    @keyframes animat {
        0% {
            transform: rotate(5deg);
            transform: translateY(200vh);
        }

        100% {
            transform: rotate(100deg);
            transform: translateY(-200vh);
        }
    }

    /*# sourceMappingURL=Error.css.map */
</style>

<body>

    <div class="effect_container">
        <div class="effect">
            <span style="--i:23;"></span>
            <span style="--i:13;"></span>
            <span style="--i:5;"></span>
            <span style="--i:50;"></span>
            <span style="--i:3;"></span>
            <span style="--i:10;"></span>
            <span style="--i:24;"></span>
            <span style="--i:13;"></span>
            <span style="--i:6;"></span>
            <span style="--i:9;"></span>
            <span style="--i:2;"></span>
            <span style="--i:5;"></span>
            <span style="--i:50;"></span>
            <span style="--i:3;"></span>
            <span style="--i:27;"></span>
            <span style="--i:5;"></span>
            <span style="--i:50;"></span>
            <span style="--i:10;"></span>
            <span style="--i:13;"></span>
            <span style="--i:5;"></span>
            <span style="--i:50;"></span>
            <span style="--i:3;"></span>
            <span style="--i:10;"></span>
            <span style="--i:24;"></span>
            <span style="--i:13;"></span>
            <span style="--i:6;"></span>
            <span style="--i:50;"></span>
            <span style="--i:10;"></span>
            <span style="--i:24;"></span>
            <span style="--i:13;"></span>
            <span style="--i:6;"></span>
            <span style="--i:9;"></span>
            <span style="--i:2;"></span>
            <span style="--i:5;"></span>
            <span style="--i:50;"></span>
            <span style="--i:3;"></span>
            <span style="--i:27;"></span>
            <span style="--i:3;"></span>
            <span style="--i:27;"></span>
            <span style="--i:5;"></span>
            <span style="--i:5;"></span>
            <span style="--i:50;"></span>
            <span style="--i:3;"></span>
            <span style="--i:35;"></span>
            <span style="--i:24;"></span>
            <span style="--i:13;"></span>
            <span style="--i:6;"></span>
            <span style="--i:23;"></span>
            <span style="--i:13;"></span>
            <span style="--i:5;"></span>
            <span style="--i:50;"></span>
            <span style="--i:3;"></span>
            <span style="--i:4;"></span>
            <span style="--i:24;"></span>
            <span style="--i:50;"></span>
            <span style="--i:3;"></span>
            <span style="--i:27;"></span>
            <span style="--i:26;"></span>
            <span style="--i:50;"></span>
            <span style="--i:8;"></span>
            <span style="--i:13;"></span>
            <span style="--i:6;"></span>
            <span style="--i:9;"></span>
            <span style="--i:2;"></span>
            <span style="--i:25;"></span>
            <span style="--i:8;"></span>
            <span style="--i:9;"></span>
            <span style="--i:7;"></span>
            <span style="--i:6;"></span>
            <span style="--i:1;"></span>
            <span style="--i:30;"></span>
            <span style="--i:20;"></span>
            <span style="--i:5;"></span>
            <span style="--i:10;"></span>

        </div>
    </div>
    <!--  -->

    <div class="error">
        <span></span>
        <div class="continer">
            <div class="taitel">
                <h1 class="mini">Mini bots</h1>
                <p>@yield('message')</p>
            </div>
            <div class="error_404">
                <h1>@yield('code')</h1>
            </div>
        </div>
    </div>

</body>

</html>