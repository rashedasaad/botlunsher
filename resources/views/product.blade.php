<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    

    <?php print_r($shows[0]->product_name); ?>




   





<?php 


   $intervels = [];
        for ($i=0; $i < count($shows); $i++) { 
          
            if ($shows[$i]->interval) {
                array_push($intervels,$shows[$i]->interval);
            }
          
          
        }

        $plan_id = [];
        for ($i=0; $i < count($shows); $i++) { 
          
            if ($shows[$i]->plan_id) {
                array_push($plan_id,$shows[$i]->plan_id);
            }
          
          
        }
        
        
        ?>

 <form action="{{ route("getProduct") }}" method="POST">
    @csrf
    <select name="interval" id="">
        <?php for ($i=0; $i <  count($intervels); $i++) { 
            # code...
       ?>
        <option value="<?php print_r($plan_id[$i]) ?>"><?php print_r($intervels[$i]) ?></option>
    
        <?php
         } 
         ?>
         
     </select>
        <input type="hidden" name="productname" value="<?php print_r($shows[0]->product_id)?>">
    <input type="submit">    
    </form>


</body>
</html>