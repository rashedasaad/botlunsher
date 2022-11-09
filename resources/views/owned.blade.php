<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env("APP_NAME")}}</title>
</head>
<body>
    @foreach ($rearrays as $response)


        
                <?php print_r($response->product_name) ?>
                <img src="<?php  print_r($response->img)?>"alt=""> 

                <button onclick="window.location.pathname ='/cancel/<?php print_r($response->plan_id)?>'" >cancle</button>
               
       
 
    @endforeach

    @if (session('statusbad'))
    <div class="alert alert-success">
        {{ session('statusbad') }}
    </div>
    @else
    <?php
   print_r(session('status'));
    ?>
    @endif 

</body>
</html>