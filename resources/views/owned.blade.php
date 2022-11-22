

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
    <!-- Font-Googel -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,500;1,500&family=Open+Sans:ital,wght@0,600;1,500;1,600&display=swap"
        rel="stylesheet">
        
</head>

<body>

    @if (session('statusbad'))
    <div class="alert alert-success">
        {{ session('statusbad') }}
    </div>
@else
    <?php
    print_r(session('status'));
    ?>
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
                        <a href="/update">Account</a>
                        <a class="activ" href="#">My Bots</a>
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
                            <h2> <?php print_r($response->product_name); ?> </h2>
                            <span class="title"> <?php print_r($response->details);?></span>
                            <a href="/cancel/<?php print_r($response->plan_id); ?>">cancel</a>
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
    </script>
</body>

</html>
