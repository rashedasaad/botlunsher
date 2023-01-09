<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bot starter</title>
    <link rel="stylesheet" href=" {{ asset("css/all.min.css") }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset("css/slash.css") }}">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,600;1,500;1,600&display=swap" rel="stylesheet">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    @if (session('statusbad'))

    <p style="display: none"  class="error">{{ session('statusbad') }}</p>
    <p style="display: none"  class="boolean">{{ session('bool') }}</p>

    @elseif (session('status'))  
    <p style="display: none"  class="error">{{ session('status') }}</p>
    <p style="display: none" class="boolean">{{ session('bool') }}</p>
    @endif

    <p id="config_getter" style="display:none;"><?php  echo htmlentities($is_config_there) ?></p> 
 
    <div id="configrate" class="alert_1">
        <p>Are you sure that you want</p>
        <p>To update your configration?</p>
        <div class="buttons">
            <form action="{{ route("configrate") }}" method="POST">
                @csrf
                <textarea name="config" id="configSendr" style="display: none;"></textarea>
                <button type="submit" class="yes">yes</button>
            </form>
            <button class="no">no</button>
        </div>
    </div>
    <div id="update_script" class="alert_1">
        <p>If you update your script</p>
        <p>All your configration will restart !!!</p>
        <div class="buttons">
            <form action="{{ route("update_script") }}" method="POST">
                @csrf
                <input name="script_name" value="{{ $user_verion_config["script_name"] }}" type="hidden">
                <input name="version" value="{{ $user_verion_config["script_vr_number"] }}" type="hidden">
                <button type="submit" class="yes">yes</button>
            </form>
            <button class="no">no</button>
        </div>
    </div>
    <div class="glass" id="glass"></div>
    <div class="afterLoding"></div>
        <!-- start header -->
    <header>
        <div class="container ">
            <a id="back" href="/product" class="icon">Back</a>
        </div>
    </header>
    <!-- End header -->

    <!-- Start section -->
    <section>
        <div class="container">
            <div class="popup-overlay">
                <span></span>
                <video id="Videos" class="vid" src="{{ $finayl_array[0]["vid"] }}" controls controlsList="nodownload">
                    <source   type="video/mp4" >
                    Your browser does not support the video tag.
                </video>
                <span class="aft"></span>
                <i onclick="playVid()" class="fas fa-play active" id="plays"></i>
                <i onclick="pauseVid()" style="opacity: 0;" class="fas fa-stop "></i>
            </div>

            <div class="botText">
               <p style="display:none;" id="is_the_last_version">{{ $is_thelast_version == false ? 'false' : 'true' }}</p>
                <img id="image" alt="" src="{{ $finayl_array[0]["img"] }}">
                <div class="text">
                    <h1><span id="name">{{ $finayl_array[0]["product_name"] }}</span> Bot</h1>
                    <h1><span id="status">status: </span> {{ $botSatatus }}</h1>
                    <p id="cost"></p>
                </div>
                <div class="text_1">
                    <button class="btn1" href="/lala" style="display: none" id="isUpdatedButton">Update</button>
                    <button id="explain" class="btn1">Explain</button>
                    <form style="display: inline-block" method="POST" action="{{ route("run_script") }}">
                        @csrf
                        <input value="{{ $botSatatus == 'online' ? 'off' : 'on' }}" type="hidden" name="msg">
                        <input name="script_name" value="{{ $user_verion_config["script_name"] }}" type="hidden">
                        <input name="version" value="{{ $user_verion_config["script_vr_number"] }}" type="hidden">
                        <button id="runScript" type = "submit" style="border-top-right-radius: 0; "class="btn1">{{ $botSatatus == 'online' ? 'Stop' : 'Run' }}</button>
                    </form>
                    <button id="configBtn" class="btn1">Confing</button>
                </div>
            </div>
            <div class="textSuspension">
                <h1>Bot Description</h1>
                <p id="detales">{{ $finayl_array[0]["details"] }}
                </p>
            </div>
            <div class="inputBox" id="configDiv">
                
                <?php htmlentities(print_r($user_verion_config->html_config)) ?>
                
            </div>
        </div>
        </section>
    <!-- End section -->

        <script defer src="{{ asset("js/bot_sup.js") }}"></script>
        <script src="{{ asset("js/slash.js") }}"></script>
        
       
</body>
</html>

<!-- <button class="plus">plus</button> -->
<!-- <button class="noPlus">hide</button> -->
