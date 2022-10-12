<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($rearrays as $response)


        
                <?php print_r($response->product_name) ?>
                <img src="<?php  print_r($response->img)?>"alt=""> 

                <button onclick="window.location.pathname ='/show/<?php print_r($response->product_name)?>'" >buy</button>
               
       
 
    @endforeach
</body>
</html>
