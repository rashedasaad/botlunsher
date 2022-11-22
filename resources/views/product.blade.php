<?php

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
    <link rel="stylesheet" href="{{ URL::asset('scss/card/card.css') }}">
    <!-- Font-Googel -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,500;1,500&family=Open+Sans:ital,wght@0,600;1,500;1,600&display=swap"
        rel="stylesheet">
</head>
<body>

    <div class="appearance">

    </div>
    
    <div class="card">
        <div class="contenar">
            <div class="allcontent">
                <div class="disc_Img">
                    <div class="imges">
                        <img src="<?php print_r($shows[0]["img"]);?>" alt="">
                    </div>
                    <div class="all_ds">
                        <div class="texttt">
                            <h1>  <?php print_r($shows[0]["product_name"]); ?></h1>
                        </div>
                        <div class="Pprasing">
                            <h1>month pris <span>$<?php print_r($shows[0]["price"][1]) ?></span></h1>
                            <p>All prices include VAT.</p>
                            <div class="select" tabindex="1">
                                <form action="{{ route('getProduct') }}"  method="POST">
                                    @csrf
               
                                    <input  value="<?php print_r($shows[0]["month"])?>" class="selectopt pric" name="interval" type="radio" id="1" checked>
                                    <label for="1" class="option"> <?php echo "month"?> </label>
      
               
                                    <input  value="<?php print_r($shows[0]["year"])?>" class="selectopt pric" name="interval" type="radio" id="2" >
                                    <label for="2" class="option"> <?php echo "year"?> </label>
      
                           
                                    <input type="hidden" name="productname" value="<?php print_r($shows[0]["product_name"]); ?>">
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="disc_Img">
                    <div class="discr">
                        <h1>discrption</h1>
                        <p><?php print_r($shows[0]["details"])?></p>
                    </div>
                </div>
                <div class="subm">
                 <input class="submit" type="submit">
                </div>
            </form>

            </div>
        </div>
    </div>
</body>
</html>