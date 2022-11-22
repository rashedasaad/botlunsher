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
    <link rel="stylesheet" href="{{ URL::asset('scss/main/main.css') }}">
    <!-- Font-Googel -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,500;1,500&family=Open+Sans:ital,wght@0,600;1,500;1,600&display=swap"
        rel="stylesheet">
</head>
<body>
    <!-- Start nav bullets -->
    <div class="nav-bullets">
        <div class="bullet" data-section=".Home">
            <span></span>
            <div class="tooltip active">Home
                <h6></h6>
            </div>
        </div>
        <div class="bullet" data-section=".Aboute">
            <span></span>
            <div class="tooltip">Aboute
                <h6></h6>
            </div>
        </div>
        <div class="bullet" data-section=".discord">
            <span></span>
            <div class="tooltip">discord
                <h6></h6>
            </div>
        </div>
        <div class="bullet" data-section=".strore">
            <span></span>
            <div class="tooltip">strore
                <h6></h6>
            </div>
        </div>
        <div class="bullet" data-section=".Pricing">
            <span></span>
            <div class="tooltip">Pricing
                <h6></h6>
            </div>
        </div>
        <div class="bullet" data-section=".footer">
            <span></span>
            <div class="tooltip">footer
                <h6></h6>
            </div>
        </div>
        <div class="bullet" data-section=".Log">
            <span></span>
            <div class="tooltip">Log in
                <h6></h6>
            </div>
        </div>
    </div>
    <!-- End nav bullets -->

    <!-- Start Landing Page -->
    <div class="landing_page">
        <img src="{{ URL::asset('img/img1.jpg') }}" alt="">
        <div class="overlay"></div>
        <div class="container">
            <div class="text-landing">
                <h1> All <span> your </span> Bots inone place</h1>
                <p>Lorem ipsum dolor Lorem ipsum dolor sit. Lorem ipsum dolor sit, amet consectetur adipisicing.sit
                    amet consectetur. Lorem ipsum dolor sit amet.</p>
            </div>
            <div class="titel">
                <p>facking Yofie smaa</p>
            </div>
        </div>
    </div>
    <!-- End Landing Page -->

    <!--  -->
    <div class="effect_container">
        <div class="effect">
            <span style="--i:23;"></span>
            <span style="--i:13;"></span>
            <span style="--i:10;"></span>
            <span style="--i:24;"></span>
            <span style="--i:2;"></span>
            <span style="--i:37;"></span>
            <span style="--i:87;"></span>
            <span style="--i:3;"></span>
            <span style="--i:27;"></span>
            <span style="--i:50;"></span>
            <span style="--i:30;"></span>
            <span style="--i:37;"></span>
            <span style="--i:87;"></span>
            <span style="--i:13;"></span>
            <span style="--i:16;"></span>
            <span style="--i:9;"></span>
            <span style="--i:60;"></span>
            <span style="--i:24;"></span>
            <span style="--i:51;"></span>
            <span style="--i:21;"></span>
            <span style="--i:44;"></span>
            <span style="--i:6;"></span>
            <span style="--i:9;"></span>
            <span style="--i:2;"></span>
            <span style="--i:5;"></span>
            <span style="--i:23;"></span>
            <span style="--i:13;"></span>
            <span style="--i:60;"></span>
            <span style="--i:4;"></span>
            <span style="--i:7;"></span>
            <span style="--i:2;"></span>
            <span style="--i:10;"></span>
            <span style="--i:24;"></span>
            <span style="--i:50;"></span>
            <span style="--i:87;"></span>
            <span style="--i:3;"></span>
            <span style="--i:27;"></span>
        </div>
    </div>
    <!--  -->

    <!-- Start Aboute -->
    <div class="aboute">
        <div class="container">
            <div class="aboute-content">
                <div class="left card1_left">
                    <div class="content">
                        <h3>content</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore,
                            molestias! Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Officiis aliquam tenetur optio dolor aperiam repellat ex, suscipit
                            sunt accusantium voluptates?</p>
                    </div>
                    <h2 class="shado">lolo is cool and i love lolo</h2>
                </div>
                <div class="clearfix"></div>
                <div class="right card1_right">
                    <div class="content">
                        <h3>Title for content</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore,
                            molestias! Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Officiis aliquam tenetur optio dolor aperiam repellat ex, suscipit
                            sunt accusantium voluptates?</p>
                    </div>
                    <h2 class="shado">lolo is cool and i love lolo</h3>
                </div>
                <div class="clearfix"></div>
                <div class="left card1_left">
                    <div class="content">
                        <h3>Title for content</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore,
                            molestias! Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Officiis aliquam tenetur optio dolor aperiam repellat ex, suscipit
                            sunt accusantium voluptates?</p>
                    </div>
                    <h2 class="shado">lolo is cool and i love lolo</h2>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- End Aboute -->

    <!-- Start discord -->
    <div class="discord">
        <div class="discord-content">

            <div class="left box_left">
                <div class="content">
                    <div class="title">
                        <img src="{{ URL::asset('img/Icon_01.png') }}" alt="">
                    </div>
                    <h1>Title for content</h1>
                    <h2 class="texxt">jsut text</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore,
                        molestias! Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Officiis aliquam tenetur optio dolor aperiam repellat ex, suscipit
                        sunt accusantium voluptates?</p>
                </div>
            </div>

            <div class="right box_right">
                <div class="content">
                    <div class="title">
                        <img src="{{ URL::asset('img/Icon_01.png') }}" alt="">
                    </div>
                    <h1>Title for content</h1>
                    <h2 class="texxt">jsut text</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore,
                        molestias! Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Officiis aliquam tenetur optio dolor aperiam repellat ex, suscipit
                        sunt accusantium voluptates?</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End discord -->

    <!-- Start strore -->
    <div class="strore">
        <div class="strore-content">

            <div class="top card1_top">
                <div class="content">
                    <div class="title">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore,
                            molestias! Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Officiis aliquam tenetur optio dolor aperiam repellat ex, suscipit
                            sunt accusantium voluptates?</p>
                    </div>
                    <div class="nameImges">
                        <h1>Title for content</h1>
                        <img src="{{ URL::asset('img/Icon_01.png') }}" alt="">
                    </div>
                    <div class="gridBox">
                        <h2>jsut text</h2>
                        <div>
                            <img src="{{ URL::asset('img/Icon_01.png') }}" alt="">
                        </div>
                        <div>
                            <img src="{{ URL::asset('img/Icon_01.png') }}" alt="">
                        </div>
                        <div>
                            <img src={{ URL::asset('img/Icon_01.png') }}" alt="">
                        </div>
                        <div>
                            <img src="{{ URL::asset('img/Icon_01.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="bottom card1_bottom">
                <div class="content">
                    <div class="title">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore,
                            molestias! Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Officiis aliquam tenetur optio dolor aperiam repellat ex, suscipit
                            sunt accusantium voluptates?</p>
                    </div>
                    <div class="nameImges">
                        <h1>Title for content</h1>
                        <img src="{{ URL::asset('img/Icon_01.png') }}" alt="">
                    </div>
                    <div class="gridBox">
                        <h2>jsut text</h2>
                        <div>
                            <img src="{{ URL::asset('img/Icon_01.png') }}" alt="">
                        </div>
                        <div>
                            <img src="{{ URL::asset('img/Icon_01.png') }}" alt="">
                        </div>
                        <div>
                            <img src="{{ URL::asset('img/Icon_01.png') }}" alt="">
                        </div>
                        <div>
                            <img src="{{ URL::asset('img/Icon_01.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End discord -->

    <!-- Start Pricing  -->
    <div class="Pricing">
        <div class="backgraond">
            <div class="container">
                <div class="box">
                    <div class="text-titel">
                        <h1> Basic </h1>
                        <img src="{{ URL::asset('img/Icon_01.png') }}" alt="">
                    </div>
                    <ul>
                        <div class="botten">
                            <ul>
                                <li> 10GB HDD Space </li>
                                <li> 5 Email Addresse </li>
                                <li> 2 Subdomains </li>
                                <li> Basic Support </li>
                            </ul>
                            <a href="#"> Choose Plan </a>
                        </div>
                </div>
                <div class="box">
                    <div class="text-titel">
                        <h1> Basic </h1>
                        <img src="{{ URL::asset('img/Icon_01.png') }}" alt="">
                    </div>
                    <div class="botten">
                        <ul>
                            <li> 10GB HDD Space </li>
                            <li> 5 Email Addresse </li>
                            <li> 2 Subdomains </li>
                            <li> Basic Support </li>
                        </ul>
                        <a href="#"> Choose Plan </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Pricing  -->

    <!-- Start Foter -->
    <footer class="footer">
        <div class="footer-content">

            <div class="top">
                <div class="content">
                    <div class="text_right">
                        <h1>Are You Excited?</h1>
                    </div>
                    <div class="card-left">
                        <h2>text love text with lala and i love my self to do this man fuck you trump</h2>
                    </div>
                </div>
            </div>

            <div class="bottom">
                <div class="content">
                    <div class="card-right">
                        <h2>text love text with lala and i love my self to do this man fuck you trump</h2>
                    </div>
                    <div class="text_left">
                        <h1>Let’s Start Now</h1>
                    </div>
                </div>
            </div>

        </div>
    </footer>
    <!-- End Foter -->

    <script src="{{ URL::asset('js/main.js') }}"></script>
    <script src="{{ URL::asset('js/nav_bar.js') }}"></script>
    <script src="{{ URL::asset('js/function.js') }}"></script>
</body>
</html>