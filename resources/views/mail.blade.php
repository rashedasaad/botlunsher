
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rest Password</title>
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

    ul {
        list-style: none;
    }

    .mile {
        max-width: 600px;
        margin: 0 auto;
        background-color: rgb(0, 0, 0);
        border-radius: 0 0 max(1vw, 1em) max(1vw, 1em);
    }

    .mile .conteinr .textaCompany {
        text-align: end;
        padding: max(1vw, 1em);
        background-image: linear-gradient(90deg, #00CE79, black);
    }

    .mile .conteinr .textaCompany h1 {
        color: white;
        font-size: max(2.5vw, 2.5em);
    }

    .mile .conteinr .Welcome {
        text-align: center;
        padding: max(1vw, 1em);
    }

    .mile .conteinr .Welcome h2 {
        color: white;
        font-size: max(2.5vw, 2.5em);
    }

    .mile .conteinr .Welcome p {
        text-align: center;
        color: #777;
        font-size: max(1.5vw, 1.5em);
    }

    .mile .conteinr .Code {
        background-color: white;
        text-align: center;
        padding: max(1vw, 1em);
    }

    .mile .conteinr .Code h1 {
        text-align: center;
        font-size: max(2vw, 2em);
    }

    .mile .conteinr .masgge {
        text-align: center;
        padding: max(1vw, 1em);
    }

    .mile .conteinr .masgge h4 {
        font-size: max(1vw, 1em);
        color: white;
    }

    .mile .conteinr .link {
        text-align: center;
        margin: max(1vw, 1em) auto;
    }

    .mile .conteinr .link a {
        padding: max(1vw, 1em) max(1.8vw, 1.8em);
        background-color: #00ce79;
        color: white;
        font-weight: bold;
        border-radius: max(0.2vw, 0.2em);
    }

</style>
<body>

    <div class="mile">
        <div class="conteinr">
            <div class="textaCompany">
                <h1>Mini Bots</h1>
            </div>

            <div class="Welcome">
                <h2>Welcome to {{ $info["subject"] }} !</h2>
                <p>Use the verification code below to log in.</p>
            </div>

            <div class="Code">
                <h1>{{ $info["body"] }} </h1>
            </div>

            <div class="masgge">
                <h4>You received this email because you requested to log in to your Supercell ID. If you didn't request
                    to log in, you can safely ignore this email</h4>
            </div>

            <div class="link">
                <a href="{{ $info["code_link"] }}">verfiy link</a>
            </div>
        </div>
    </div>

</body>

</html>
