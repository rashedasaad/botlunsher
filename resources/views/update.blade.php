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
    <link rel="stylesheet" href="{{ URL::asset('scss/Account/Account.css') }}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script src="https://www.google.com/recaptcha/api.js"></script>

    <!-- Font-Googel -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,500;1,500&family=Open+Sans:ital,wght@0,600;1,500;1,600&display=swap"
        rel="stylesheet">
        <script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<body>
    @if (session('statusbad'))
    <input class="error" type="hidden" value="{{ session('statusbad') }}">    
    @elseif (session('status'))
    <input class="error" type="hidden" value="{{ session('status') }}">    
    @endif
    
    <!-- Start menu -->
    <form action="{{route("update")}}" method="POST"></form>
    @csrf
    <div class="asid">
        <div class="asid_bag">
        <div class="selct_box">
                <div class="toggle-settings">
                    <i class="settin fas fa-cog fa-spin"></i>
                </div>

                <div class="leftt">
                    <div class="product">
                        <h1>naum</h1>
                    </div>
                    <div class="link">
                        <div class="top">
                            <a class="activ" href="#">Account</a>
                            <a href="/owned">My Bots</a>
                        </div>

                        <div class="bottom">
                            <a id="deletAccoun" class="redDelet" href="#">Delete Account</a>
                            <div class="delet_new">
                                <span></span>
                                <div class="contenar11">
                                    <div class="Icon_d">
                                        <i class="fas fa-times"></i>
                                    </div>
                                    <h1>Are you sure that you want to delete your account ?</h1>
                                    <form action="{{ route('delete') }}" method="POST">
                                        @csrf
                                        <input placeholder="password" type="password" name="password">
                                        <div class="butoon">
                                            <div class="col-md-6"> {!! htmlFormSnippet() !!} </div>
                                            <input class="sub" type="submit" value="Delete">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="com">
                <div class="nav_Mini-Bots">
                    <h1>naum</h1>
                    <span></span>
                </div>
                <!-- Stat Card -->
                <section>
                    <h1>Text uoser name</h1>
                    <div class="contenar">
                        <div class="card">
                            <button id="userbutt" class="glow-button" href="#">username</button>
                            <button id="emailbutt" class="glow-button" href="#">email</button>
                            <button id="passwordbutt" class="glow-button" href="#">password</button>
                        </div>

                        <div class="informations">
                            <h1 id="names">username</h1>
                            <div class="contact">
                                <!-- username -->
                                <div id="username" class="username">
                                    <form action="{{route("update")}}" method="post">
                                        @csrf
                                        <input type="text" placeholder="username" name="username">
                                        <input type="password" name="last_password" placeholder="last password">
                                        <div class="col-md-6"> {!! htmlFormSnippet() !!} </div>
                                        <div class="boteen">
                                            <input class="click" type="submit">
                                        </div>
                                    </form>
                                </div>
                                <!-- email -->
                                <div style="display: none;" id="email" class="email">
                                    <form action="{{route("update")}}" method="post">
                                        @csrf
                                        <input type="text" placeholder="email" name="email">
                                        <input type="password" name="last_password" placeholder="last password">
                                        <div class="col-md-6"> {!! htmlFormSnippet() !!} </div>
                                        <div class="boteen">
                                            <input class="click" type="submit">
                                        </div>
                                    </form>
                                </div>
                                <!-- password -->
                                <div style="display: none;" id="password" class="password">
                                    <form action="{{route("update")}}" method="post">
                                        @csrf
                                        <input type="password" name="last_password" placeholder="last password">         
                                        <input type="password" name="newPasswrod" placeholder="new Password">
                                        <input type="password" name="confirm_password" placeholder="confirm password">
                                        <div class="col-md-6"> {!! htmlFormSnippet() !!}</div>
                                        <div class="boteen">
                                            <input class="click" type="submit">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- End Card -->
    </div>
    <!-- End menu -->


    <script>
        // ==============================================
        let deletAccoun = document.getElementById("deletAccoun");
        let delet_new = document.querySelector(".delet_new");
        let Icon_i = document.querySelector(".Icon_d i");
        deletAccoun.onclick = () => {
            delet_new.style = "opacity: 1;transition: all 0.6s ease 0s;display: block;"

            if (delet_new !== "block") {
                Icon_i.onclick = () => {
                    delet_new.style.display = "none";
                };
            };
        };
        // ==============================================



        let Icon = document.querySelector(".toggle-settings .settin")
        let opens = document.querySelector(".selct_box")
        let leftt = document.querySelector(".leftt")
        let com = document.querySelector(".com")

        let left = true;
        let comaa = true;
        Icon.onclick = async () => {
            Icon.classList.toggle("fa-spin");
            document.querySelector(".selct_box").classList.toggle("clos");
            opens.style = "transition: ease .7s;"

            if (left) {
                left = false;
                leftt.style = "transition: .7s;left: max(-31vw, -30em);position: relative;"
            } else {
                left = true;
                leftt.style = "transition: .7s;left: 0px;position: relative;"
            };
            if (comaa) {
                comaa = false;
                com.style = "width: max(100vw, 100em);transition: ease .7s;"
            } else {
                comaa = true;
                com.style = "width: max(75vw, 75em);transition: ease .7s;"
            };
        };



        let names = document.getElementById("names")
        let username = document.getElementById("username")
        let email = document.getElementById("email")
        let password = document.getElementById("password")

        let userbutt = document.getElementById("userbutt")
        let emailbutt = document.getElementById("emailbutt")
        let passwordbutt = document.getElementById("passwordbutt")

        let allDivs = [username, email, password]
        let buttons = [userbutt, emailbutt, passwordbutt]

        buttons.forEach(element => {
            element.onclick = async () => {

                for (let i = 0; i < allDivs.length; i++) {
                    allDivs[i].style.display = "none";

                    if (element == userbutt) {
                        if (allDivs[i] == username) {
                            names.innerHTML = "username"
                            allDivs[i].style.display = "block";
                        };
                    }
                    else if (element == emailbutt) {
                        if (allDivs[i] == email) {
                            names.innerHTML = "email"
                            allDivs[i].style.display = "block";
                        };
                    }
                    else if (element == passwordbutt) {
                        if (allDivs[i] == password) {
                            names.innerHTML = "password"
                            allDivs[i].style.display = "block";
                        };
                    };
                };
            };
        });
    </script>
</body>
</html>