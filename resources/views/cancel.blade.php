<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env("APP_NAME")}}</title>
</head>
<body>
 <?php
    
    print_r($shows[0]->product_name);
    echo "<br>";
    print_r($shows[0]->interval);

    
    
    ?>
    <form action="{{ route("cancel") }}" method="POST">
        @csrf
        <input type="password" placeholder="password" name="password">
        <input type="hidden" value="<?php print_r($shows[0]->plan_id)?>" name="plan_id">
        <input type="submit">
    </form>
</body>
</html>