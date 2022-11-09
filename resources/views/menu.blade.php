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
    <link rel="stylesheet" href="{{ URL::asset('css/menu.css') }}">
    <!-- Font-Googel -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,500;1,500&family=Open+Sans:ital,wght@0,600;1,500;1,600&display=swap"
        rel="stylesheet">
</head>

<body>



    <!-- Start menu -->
    <div class="menu">
        <div class="menu_bag">
            <div class="selct_box">
                <img src="/Src/img/Icon_01.png" alt="">
                <div class="product">
                    <h1>product_name</h1>
                    <p>price:<span>50$</span></p>
                </div>
                <video src=""></video>
                <div class="detail">
                    <h3>details</h3>
                    <p>laladssfg fkbopvk dfokbdfokzds Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloribus, quo reprehenderit. Accusantium voluptatem quaerat labore maxime impedit saepe dignissimos quasi exercitationem ipsa soluta! Neque dolorum, quis recusandae velit necessitatibus unde! oppdkfbdpovd odfbjdpoefj odfjdpov regserg estraaf efawef ar dihvsdihv ihdovihdoi dfvhdsoi hdvihdopi hc d hoidhoidshoi iohsdoivhdsoi idosvsdoihsaeo idjvosijvse is lala i love lala and you must love lala as you want i love to be kaka</p>
                </div>
                <div class="btntn">
                    <a href="#">subscriped</a>
                </div>
            </div>
            <div class="com">
                <div class="nav_Mini-Bots">
                    <p>BACK</p>
                    <h1>Mini Bots</h1>
                    <span></span>
                </div>
                <!-- Stat Card -->
                <section>
                    <div class="contenar">
                        
                            @foreach ($rearrays as $response)
                            <div class="box">
                            <img src="<?php  print_r($response->img)?>" alt="">
                            <h2> <?php print_r($response->product_name) ?> </h2>
                            <span class="title"> <?php print_r($response->details) ?></span>
                            <a href='/show/<?php print_r($response->product_name)?>'>Choose Plan</a>
                            <input type="hidden" value="<?php print_r($response->owned);?>">
                            </div>
                        
                        @endforeach
                        
                    </div>
                </section>
            </div>
            <!-- End Card -->
        </div>
    </div>
    <!-- End menu -->

</body>

</html>