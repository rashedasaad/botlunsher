<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{ URL::asset('css/all.min.css') }}">
    <!-- style.css -->
    <link rel="stylesheet" href="{{ URL::asset('scss/My-Bots/My-Bots.css') }}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <!-- Font-Googel -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,500;1,500&family=Open+Sans:ital,wght@0,600;1,500;1,600&display=swap"
        rel="stylesheet">

</head>

<body>

    @if (session('statusbad'))
    <input class="error" type="hidden" value="{{ session('statusbad') }}">    
    @elseif (session('status'))
    <input class="error" type="hidden" value="{{ session('status') }}">    
    @endif
    

    <!-- Start menu -->
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
                            <a href="#">Account</a>
                            <a class="activ" href="/update">My Bots</a>
                        </div>
                        <div class="bottom">
                            <a id="deletAccoun" class="redDelet" href="#">Delete Account</a>

                            <div class="delet_new">
                                <span></span>
                                <div class="contenar11">
                                    <div class="Icon_d">
                                        <i class="fas fa-times"></i>
                                    </div>
                                    <h1>Are you sure that you want to delete your account?</h1>
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
                    <div class="contenar">
                        @foreach ($rearrays as $response)
                            <div class="box">
                                <img src="<?php print_r($response->img); ?>" alt="">
                                <h2><?php print_r($response->product_name); ?></h2>
                                <span class="title"><?php print_r($response->details); ?> </span>
                                <a class="cancel" href="#">cancel</a>

                                <div class="card_new">
                                    <span></span>
                                    <div class="contenar11">
                                        <div class="Icon_d">
                                            <i id="card_Icon" class="fas fa-times"></i>
                                        </div>
                                        <h1>Are you sure that you want to cancle your subscription?</h1>
                                        <form action="http://127.0.0.1:8000/cancel/sub/<?php print_r($response->plan_id); ?>"
                                            method="POST">
                                            @csrf
                                            <input placeholder="password" type="password" name="password">
                                            <div class="butoon">
                                                <div class="col-md-6"> {!! htmlFormSnippet() !!} </div>
                                                <input class="sub" type="submit" value="submit">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </section>
            </div>
        </div>
        <!-- End Card -->
    </div>
    <!-- End menu -->


    <script>
        // ==============================================
        let cancel = document.querySelectorAll(".cancel");
        let card_new = document.querySelector(".card_new");
        let card_Icon = document.querySelector(".contenar11 .Icon_d #card_Icon");
        console.log();
        cancel.forEach(element => {
            element.onclick = () => {
                card_new.style = "opacity: 1;transition: all 0.6s ease 0s;display: block;"

                if (card_new !== "block") {
                    card_Icon.onclick = () => {
                        card_new.style.display = "none";
                    };
                };
            };
        });
        // ==============================================
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

        let error = document.querySelector(".error")

        if (error.value != "") {
            if(error.value != ""){
                Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: error.value,
                showConfirmButton: false,
                timer: 3000
                })
            }
      
        }
    </script>
</body>

</html>
