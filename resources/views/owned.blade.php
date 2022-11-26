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

    <p style="display: none"  class="error">{{ session('statusbad') }}</p>
    <p style="display: none"  class="boolean">{{ session('bool') }}</p>

    @elseif (session('status'))  
    <p style="display: none"  class="error">{{ session('status') }}</p>
    <p style="display: none" class="boolean">{{ session('bool') }}</p>
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
                        <h1>{{ session("user_session")["username"] }}</h1>
                    </div>
                    <div class="link">
                        <div class="top">
                            <a href="#">Account</a>
                            <a class="activ" href="/update">My Bots</a>
                            <a href="/product">back to store</a>
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
                    <h1>{{ session("user_session")["username"] }}</h1>
                    <span></span>
                </div>
                <!-- Stat Card -->
                <section>
                    <div class="contenar">
                        @foreach ($rearrays as $response)
                            <div class="box">
                                <img src="<?php print_r($response->img); ?>" alt="">
                                <h2><?php print_r($response->product_name); ?></h2>
                                <span class="title"></span>
                                <p style="display: none" class="plan_id"><?php print_r($response->plan_id); ?></p>
                                <p style="display: none" class="timer"><?php print_r($response->will_end_at); ?></p>
                                <a class="cancel" href="#">cancel</a>
                            </div>
                        @endforeach

                        <div class="card_new">
                            <span></span>
                            <div class="contenar11">
                                <div class="Icon_d">
                                    <i id="card_Icon" class="fas fa-times"></i>
                                </div>
                                <h1>Are you sure that you want to cancle your subscription?</h1>
                                <form id="form_cancel" action="" method="POST">
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
                </section>
            </div>
        </div>
        <!-- End Card -->
    </div>
    <!-- End menu -->


    <script>
        // ==============================================

        const changeEelemt = ({
            date,
            dateViwerElm,
        }) => {
            const myDate = new Date(date);

            function getMonthDifference(startDate, endDate) {
                return (endDate.getMonth() -
                    startDate.getMonth() +
                    12 * (endDate.getFullYear() - startDate.getFullYear()));
            }

            function getDaysifference(startDate, endDate) {
                return Math.trunc((startDate.getTime() - endDate.getTime()) / (1000 * 3600 * 24));
            }
            var vlidDate = null;
            if (getMonthDifference(new Date(), myDate) >= 1) {
                vlidDate = getMonthDifference(new Date(), myDate);
                dateViwerElm.textContent = `${vlidDate} Months remainig`;
            } else if (getDaysifference(new Date(), myDate) >= 1) {
                vlidDate = getDaysifference(new Date(), myDate);
                dateViwerElm.textContent = `${vlidDate} days remainig`;
            } else {
                dateViwerElm.textContent = `it recharge today`;
                setInterval(() => {
                    if (myDate < new Date()) {
                        window.location.reload();
                    }
                }, 1000 * 60);
            }
        };

        let cancel = document.querySelectorAll(".cancel");
        let card_new = document.querySelector(".card_new");
        let form_cancel = document.querySelector("#form_cancel");
        let card_Icon = document.querySelector(".contenar11 .Icon_d #card_Icon");
        const allboxs = document.querySelectorAll(".box")
        allboxs.forEach(element => {
            const dateElm = element.querySelector('.timer');
            const dateViwer = element.querySelector('.title');
            changeEelemt({
                date: dateElm.textContent,
                dateViwerElm: dateViwer,
            });
        })
        cancel.forEach(element => {
            element.onclick = () => {

                const plan_id = element.parentElement.querySelector(".plan_id").textContent;

                form_cancel.action = "http://127.0.0.1:8000/cancel/sub/" + plan_id;
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
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: error.value,
                showConfirmButton: false,
                timer: 3000
            })
        }


        if (error.value != "") {
            if (bool.textContent == 1) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: error.textContent,
                    showConfirmButton: false,
                    timer: 3000
                })
            } else if (bool.textContent == 0) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: error.textContent,
                    showConfirmButton: false,
                    timer: 3000
                })
            }
        }
    </script>
</body>

</html>
