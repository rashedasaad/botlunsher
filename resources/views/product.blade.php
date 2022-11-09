<?php

$intervels = [];
for ($i = 0; $i < count($shows); $i++) {
    if ($shows[$i]->interval) {
        array_push($intervels, $shows[$i]->interval);
    }
}

$plan_id = [];
for ($i = 0; $i < count($shows); $i++) {
    if ($shows[$i]->plan_id) {
        array_push($plan_id, $shows[$i]->plan_id);
    }
}

$details = [];
for ($i = 0; $i < count($shows); $i++) {
    if ($shows[$i]->details) {
        array_push($details, $shows[$i]->details);
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <!-- all.min.css -->
    <link rel="stylesheet" href="{{ URL::asset('css/all.min.css') }}">
    <!-- style.css -->
    <link rel="stylesheet" href="{{ URL::asset('css/card.css') }}">
    <!-- Font-Googel -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,500;1,500&family=Open+Sans:ital,wght@0,600;1,500;1,600&display=swap"
        rel="stylesheet">
</head>

<body>


    <div class="card">
        <div class="contenar">
            <div class="disc_Img">
                <div class="imges">
                    <img src="<?php print_r($shows[0]->img); ?>" alt="">
                </div>
                <div class="all_ds">
                    <div class="texttt">
                        <h1>
                            <?php print_r($shows[0]->product_name); ?>
                        </h1>
                    </div>
                    <div class="Pprasing">

                        <h1>price <span id="price"></span></h1>



                        <p>All prices include VAT.</p>

                        <div class="select" tabindex="1">
                            <form action="{{ route('getProduct') }}"  method="POST">
                                @csrf
                                <?php 
                                for ($i=0;$i < count($intervels);$i++) {                
                                    for ($a=0; $a < count($shows) ; $a++) { 
                                        # code...
                                    }            
                                    ?>

                                <input  value="<?php print_r($shows[$i]->price)?>" class="selectopt pric" name="test" type="radio" id="<?php echo $i; ?>" checked>
                                <label for="<?php echo $i;?>" class="option"><?php print_r($intervels[$i]);?> <?php  print_r($shows[$i]->price); ?></label>
  
                                <?php
                                }
                        
                                ?>
                                <input type="hidden" name="productname" value="<?php print_r($shows[0]->product_id); ?>">
                        </div>
                    </div>
                </div>
            </div>

            <div class="disc_Img">
                <div class="discr">
                    <h1>discrption</h1>
                    <p><?php
                     print_r($details[1])
                    ?></p>
                </div>
            </div>
            <div class="subm">
                <button type="submit">submit</button>
            </div>
            </form>
        </div>
    </div>
    <script src="{{ URL::asset('js/menu.js') }}"></script>
    <script>
        const price = document.getElementById("price");
        const pric = document.getElementsByClassName("pric");

        price.innerHTML = pric 
    </script>
</body>

</html>
