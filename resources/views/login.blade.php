<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <!-- Font Awesome icons -->
    <script src="https://kit.fontawesome.com/ba2a27c1fe.js" crossorigin="anonymous"></script>
    <!--! all.min.css -->
    <link rel="stylesheet" href="{{ URL::asset('css/all.min.css') }}">
    <!--! style.css -->
    <link rel="stylesheet" href="{{ URL::asset('css/login.css') }}">
    <!--! Googel Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,500;1,400&family=Roboto+Slab:wght@400;500&display=swap"
        rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js"></script>

</head>

<body>

    <div class="appearance"></div>
    <!-- Login Start -->
    <div class="login">
        <a class="back" href="index.html">
            <i class="fa-solid fa-circle-arrow-left"></i>
        </a>
        <h2>Hello !</h2>
        <h1>Good Morning</h1>
        <div class="login-container">
            <p class="Log">Login <span>with your account</span></p>
            <!-- form -->

            @if (Session::get('user_session'))
                <?php header('location: http://127.0.0.1:8000/card '); ?>
            @endif


            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="AllForm">
                    <p>
                        <input type="text" placeholder="Username or email" name="loginusername">
                    </p>
                    <p>
                        <input id="password" type="password" placeholder="Password" name="loginpassword">
                        <i id="togglePassword" class="far fa-eye-slash"></i>
                    </p>

                    <div class="For">
                        <p id="create"> Create Account</p>
                        <a href="http://127.0.0.1:8000/forgetpassword">Forget Password?</a>
                    </div>
                    <div class="col-md-6"> {!! htmlFormSnippet() !!} </div>
                    <div class="button">
                        <input type="submit">
                    </div>

                </div>
            </form>
            <!-- form -->
            <section class="createAccount">
                <p class="creAcc">createAccount <span>with your account</span></p>
                <div class="create">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="allform">
                            <input placeholder="username" type="text" name="regusername">
                            <input placeholder="password" type="password" name="regpassword">
                            <input placeholder="confirm password" type="password" name="regrepassword">
                            <input placeholder="email addres" type="email" name="regemail">
                            <div class="col-md-6"> {!! htmlFormSnippet() !!} </div>
                        </div>
                        <div class="loginAcc">
                            <p id="log" href="#">login Account</p>
                        </div>
                        <div class="button">
                            <input type="submit">
                        </div>
                    </form>
                </div>
            </section>



        </div>
    </div>
    <!-- Login End -->


    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function() {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);

            // toggle the icon
            this.classList.toggle("fa-eye");
        });

        // prevent form submit
        const form = document.querySelectorAll("form");
        form.forEach(element => {
            element.addEventListener('submit', function(e) {
                e.preventDefault();
            });

        });



        // rigester


        let createA = document.querySelector(`#create`);
        let createAccount = document.querySelector(`.createAccount`);
        console.log(createA)
        createA.onclick = function() {
            createAccount.style.transition = `all 0.3s cubic-bezier(0, 0.01, 1, 0.57) 0s`;
            createAccount.style.borderRadius =
                `max(0.4vw, 0.4em) max(0.4vw, 0.4em) max(0.4vw, 0.4em) max(0.4vw, 0.4em)`;
            createAccount.style.left = `0%`;
            createAccount.style.cursor = `context-menu`;
        }

        let log = document.querySelector(`#log`);
        log.onclick = () => {
            createAccount.style.borderRadius = ``;
            createAccount.style.left = ``
            createAccount.style.cursor = ``
        }
    </script>
</body>

</html>
