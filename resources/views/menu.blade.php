<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <!-- all.min.css -->
    <link rel="stylesheet" href="{{ URL::asset('css/all.min.css') }}">
    <!-- style.css -->
    <link rel="stylesheet" href="{{ URL::asset('scss/menu/menu.css') }}">
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
            <div class="selct_box" id="selct_box">
                <div class="contenr">
                    <img id="img_value" src="/Src/img/Icon_01.png" alt="">
                    <div class="product">
                        <h1 id="name_value">Bot</h1>
                        <p>monthly: <span id="price_value_monthly"></span></p>
                        <p>yearly: <span id="price_value_yearly"></span></p>
                    </div>
                    <video id="video_value" src="" controls></video>
                    <div class="detail">
                        <h3>details</h3>
                        <p id="details_value"></p>
                    </div>
                    <div id="btntnSub" class="btntn">
                        <a id="true" class="grine" href="#">subscriped</a>
                        <a id="false" class="red" href="#">subscripe now !</a>
                    </div>
                </div>
            </div>
            <div class="com">
                <div class="nav_Mini-Bots">
                    <p>BACK</p>
                    <h1>Mini Bots</h1>
                    <a href="/update"><i class="fas fa-address-card"></i></a>
                </div>
                <!-- Stat Card -->
                <section>
                    @for ($p = 0; $p < count($storges); $p++)
                    @if ( $storges[$p]["product_name"] == "premium")
                    <div id="golden" class="golden">
                        <div style="display: none;" class="data_father">
                            <p class="data_price_monthly"><?php echo $storges[$p]["month_price"] ?></p>
                            <p class="data_price_yearly"><?php echo $storges[$p]["year_price"] ?></p>
                            <p class="data_key">/show/<?php echo $storges[$p]["product_name"] ?></p>
                            <p class="data_isOwned"><?php echo $storges[$p]["owend"] ?></p>
                            <p class="data_vid"><?php echo $storges[$p]["vid"] ?></p>
                        </div>
                        <img src="<?php echo $storges[$p]["img"] ?>" alt="">
                        <h2> <?php echo $storges[$p]["product_name"] ?> </h2>
                        <span class="title"> <?php echo $storges[$p]["details"] ?></span>
                        <div class="buteen change_Boxe">
                            <a href="#">Choose Plan</a>
                        </div>
                    </div>
                     @break;
                    @endif
                    @endfor

                    <div class="contenar">
                        @for ($i = 0; $i < count($storges)  ; $i++)
                        @if( $storges[$i]["product_name"] == "premium")
                        @continue;
                        @endif
                        <div class="box">
                            <div style="display: none;" class="data_father">
                                <p class="data_price_monthly"><?php echo $storges[$i]["month_price"] ?></p>
                                <p class="data_price_yearly"><?php echo $storges[$i]["year_price"] ?></p>
                                <p class="data_key">/show/<?php echo $storges[$i]["product_name"] ?></p>
                                <p class="data_isOwned"><?php echo $storges[$i]["owend"] ?></p>
                                <p class="data_vid"><?php echo $storges[$i]["vid"] ?></p>
                            </div>
                            <img src="<?php echo $storges[$i]["img"] ?>" alt="">
                            <h2><?php echo $storges[$i]["product_name"] ?></h2>
                            <span id="details" class="title"><?php echo $storges[$i]["details"] ?></span>
                            <a class="choose-plan change_Boxe" href="#">Choose Plan</a>
                        </div>
                        
                        @endfor
                    </div>

                </section>
            </div>
            <!-- End Card -->
        </div>
    </div>
    <!-- End menu -->


    <script>
        const sleep = async (dlay) => {
            return await new Promise(r => setTimeout(() => r(true), dlay))
        }

        // box
        let box = document.querySelectorAll(".change_Boxe");
        let img = document.getElementById("img");
        let name = document.getElementById("name");
        let price = document.getElementById("price");
        let video = document.getElementById("video");
        let details = document.getElementById("details");
        let choose_Plan = document.querySelectorAll(".choose-plan");
        // box

        //selct_box
        let selct_box = document.querySelector(".selct_box")
        let com = document.querySelector(".com")
        let img_value = document.querySelector("#img_value")
        let name_value = document.querySelector("#name_value")
        let price_value_monthly = document.querySelector("#price_value_monthly")
        let price_value_yearly = document.querySelector("#price_value_yearly")
        let video_value = document.querySelector("#video_value")
        let details_value = document.querySelector("#details_value")
        //selct_box
        const supButtonFther = document.querySelector('#btntnSub')
        const notSupButton = supButtonFther.querySelector('#false')
        const isSupButton = supButtonFther.querySelector('#true')

        let comaa = true;
        box.forEach(elem => {
            elem.onclick = async function () {
                const elemKey = elem.parentElement.querySelector('.data_father .data_key');
                const elemImg = elem.parentElement.querySelector('img');
                const elemName = elem.parentElement.querySelector('h2');
                const elmPrice_Mn = elem.parentElement.querySelector('.data_father .data_price_monthly');
                const elmPrice_Yr = elem.parentElement.querySelector('.data_father .data_price_yearly');
                const elemDisck = elem.parentElement.querySelector('span');
                const elemVid = elem.parentElement.querySelector('.data_father .data_vid');
                const elemIsOwned = elem.parentElement.querySelector('.data_father .data_isOwned');

                if (name_value.textContent == elemName.textContent) {
                    return
                };
                comaa = true;

                selct_box.style = "left: 0;max-width: max(25vw, 25em);transition: ease 1s;"
                if (comaa) {
                    comaa = false;
                    img_value.style = "opacity: 0; filter: blur(3px);"
                    name_value.style = "opacity: 0; filter: blur(3px);"
                    price_value_monthly.style = "opacity: 0; filter: blur(3px);"
                    price_value_yearly.style = "opacity: 0; filter: blur(3px);"
                    await sleep(500)
                    img_value.style = "opacity: 1; filter: blur(0px);"
                    com.style = "width: max(100vw, 100em);transition: ease .7s;"
                    name_value.style = "opacity: 1; filter: blur(0px);"
                    price_value_monthly.style = "opacity: 1; filter: blur(0px);"
                    price_value_yearly.style = "opacity: 1; filter: blur(0px);"
                }


                img_value.src = elemImg.src
                name_value.textContent = elemName.textContent
                video_value.src = elemVid.textContent
                details_value.textContent = elemDisck.textContent;
                price_value_monthly.textContent = elmPrice_Mn.textContent + "$"
                price_value_yearly.textContent = elmPrice_Yr.textContent + "$"
                if (elemIsOwned.textContent == 1) {
                    notSupButton.href = '';
                    isSupButton.style.display = 'block'
                    notSupButton.style.display = 'none'
                } else {
                    notSupButton.href = elemKey.textContent
                    isSupButton.style.display = 'none'
                    notSupButton.style.display = 'block'
                }
            };
        });
    </script>
</body>
</html>