<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <!-- Font Awesome icons -->
    <script src="https://kit.fontawesome.com/ba2a27c1fe.js" crossorigin="anonymous"></script>
    <!--! all.min.css -->
    <link rel="stylesheet" href="{{ URL::asset('css/all.min.css') }}">
    <!--! style.css -->
    <link rel="stylesheet" href="{{ URL::asset('scss/login/login.css') }}">
    <!-- js -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <!--! Googel Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,500;1,400&family=Roboto+Slab:wght@400;500&display=swap"
        rel="stylesheet">
</head>

<body>
    @if (session('statusbad'))
        <input class="error" type="hidden" value="{{ session('statusbad') }}">
    @endif


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
            <div class="AllForm">
                <form class="main-form" action="http://127.0.0.1:8000/store/login" method="POST">
                    @csrf
                    <p>
                        <input type="text" placeholder="Username or email" name="loginusername">
                    </p>
                    <p>
                        <input id="passwordActiv" type="password" placeholder="Password" name="loginpassword">
                        <i id="togglePassword" class="far fa-eye-slash"></i>
                    </p>

                    <div class="For">
                        <p id="create" href="#">Create Account</p>
                        <a href="/forgetpassword">Forget Password?</a>
                    </div>
                    <div class="button">
                        <div class="col-md-6"> {!! htmlFormSnippet() !!} </div>
                        <div class="link_Di">

                            <div class="google-btn">
                                <div class="google-icon-wrapper">
                                    <img class="google-icon"
                                        src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" />
                                </div>
                                <a href="/google">
                                    <button  class="btn-text"><b>Sign in with google </b></button>
                                </a>
                                </div>
                            <input id="Swal" type="submit">
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <section class="createAccount">
            <p class="creAcc">createAccount <span>with your account</span></p>

            <div class="create">
                <form class="main-form" action="http://127.0.0.1:8000/store/register" method="POST">
                    @csrf
                    <div class="allform">
                        <input placeholder="username" name="regusername" type="text">
                        <input placeholder="your email" name="regemail" type="email">

                        <div class="inputBox">
                            <input placeholder="password" name="regpassword" type="password" id="Mathe_1"
                                onkeyup="checkPassword(this.value)">
                            <span id="toggl"></span>
                        </div>

                        <input placeholder="confirm password" name="regrepassword" id="con_password" type="password"
                            id="Mathe_2" onkeyup="MathePassword(this.value)">
                    </div>
                    <div class="validation">
                        <ul>
                            <div class="left">
                                <li id="password_1"> Ensure string has two uppercase letters.</li>
                                <li id="password_2">Ensure string has one special case letter. </li>
                                <li id="password_3">Ensure string has two digits.</li>
                            </div>
                            <div class="right">
                                <li id="password_4">Ensure string has three lowercase letters.</li>
                                <li id="password_5">Ensure string is of length 8. </li>
                                <li id="Mathe">Mathe</li>
                            </div>
                        </ul>
                    </div>
                    <div class="loginAcc">
                        <p id="log">login Account</p>
                    </div>
                    <div class="button">
                        <div class="col-md-6"> {!! htmlFormSnippet() !!} </div>
                        <input type="submit">
                    </div>
                </form>
            </div>
        </section>
    </div>
    <!-- Login End -->


    <script src="{{ URL::asset('js/login.js') }}"></script>
    <script>
        // Popap
        let error = document.querySelector(".error")

        if (error.value != "") {
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: error.value,
                showConfirmButton: false,
                timer: 2000
            })
        }
        // Popap
    </script>
</body>

</html>
