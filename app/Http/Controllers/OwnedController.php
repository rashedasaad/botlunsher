<?php

namespace App\Http\Controllers;

use App\Models\config_version;
use App\Models\version;
use Illuminate\Http\Request;

class OwnedController extends Controller
{

  public function index(Request $request)
  {
    if ($request->session()->get('user_session')) {
      $user = $request->session()->get('user_session');
      $customer_id = $user["customer_id"];
    }
    if (!$request->session()->get('user_session')) {
      return redirect("/login");
    }

    FuncController::createproductsession($request);
    $responses = $request->session()->get('products');




    $rearrays = [];
    for ($i = 0; $i < count($responses["products"]); $i++) {
      if ($responses["products"][$i]->owned == true) {
        array_push($rearrays, $responses["products"][$i]);
      }
    }


    return view("Owned", compact("rearrays"));
  }

  public function cancle(Request $request, $plan_id)
  {

    $products = $request->session()->get('products');
    $products = $products["products"];



    $shows = [];

    for ($i = 0; $i < count($products); $i++) {
      if ($products[$i]->plan_id == $plan_id) {
        array_push($shows, $products[$i]);
      }
    }



    return view("cancel", compact("shows"));
  }

  public function remove($plan_id, $user_id, $password)
  {
    $remove = FuncController::sentget("/sup/remove", [env("API_ADMIN_BODY_APIKEY_KEY") => env("API_ADMIN_BODY_APIKEY_VALUE"), "plan_id" => $plan_id, "user_id" => $user_id, "password" => $password]);
    return $remove;
  }
  public function remove_google($sub, $email, $id, $plan_id)
  {
    $remove_google = FuncController::sentget("/golglo/sups/remove", [env("API_ADMIN_BODY_APIKEY_KEY") => env("API_ADMIN_BODY_APIKEY_VALUE"), "sup" => $sub, "email" => $email, "id" => $id, "plan_id" => $plan_id]);
    return $remove_google;
  }
  public function create_config($email,$is_google_user, $config, $script_name, $user_id,$google_id, $username, $password_keke)
  {
    $create_config = FuncController::sentget("/scripts/create_config", [env("API_ADMIN_BODY_APIKEY_KEY") => env("API_ADMIN_BODY_APIKEY_VALUE"), "is_google_user" => $is_google_user, "email" => $email,"google_id" => $google_id, "config" => $config, "script_name" => $script_name, "user_id" => $user_id, "username" => $username, "password_keke" => $password_keke]);
    return $create_config;
  }
  public function update_config($email,$is_google_user, $script_name, $user_id,$google_id, $username, $password_keke)
  {
    $update_config = FuncController::sentget("/scripts/update_vesrion_delete_config", [env("API_ADMIN_BODY_APIKEY_KEY") => env("API_ADMIN_BODY_APIKEY_VALUE"), "is_google_user" => $is_google_user, "email" => $email,"google_id" => $google_id, "script_name" => $script_name, "user_id" => $user_id, "username" => $username, "password_keke" => $password_keke]);
    return $update_config;
  }

  public function get_config($email, $is_google_user, $script_name, $user_id, $google_id, $username, $password_keke)
  {
    $get_config = FuncController::sentget("/scripts/get_config", [env("API_ADMIN_BODY_APIKEY_KEY") => env("API_ADMIN_BODY_APIKEY_VALUE"), "is_google_user" => $is_google_user, "email" => $email,"google_id" => $google_id,  "script_name" => $script_name, "user_id" => $user_id, "username" => $username, "password_keke" => $password_keke]);
    return $get_config;
  }

  public function run_bot($user_id,$version_num,$name,$plan_id,$oreder)
  {
    $run_bot = FuncController::sentget("/scripts/uptime", [env("API_ADMIN_BODY_APIKEY_KEY") => env("API_ADMIN_BODY_APIKEY_VALUE"),  "user_id" => $user_id, "version_num" => $version_num, "name" => $name,"plan_id" => $plan_id,"oreder" => $oreder]);
    return $run_bot;
  }


  public function store(Request $request, $plan_id)
  {

    $request->validate([
      'g-recaptcha-response' => 'recaptcha'
    ]);

    $user_session = $request->session()->get('user_session');


    $user_id = $user_session["user_id"];
    $email =  $user_session["email"];

    if ($user_session["google"] == false) {
      $password =  $request->input("password");

      if (FuncController::passwordfilter($password) == "fail") {
        return redirect("/owned")->with('statusbad', "The password is not invaild");
      }
      $remove = $this->remove($plan_id, $user_id, $password);
      if ($remove->res == "rash_1") {
        $request->session()->forget("allproducts");
        $request->session()->forget("products");

        return redirect("/owned")->with('status', $remove->msg);
      } elseif ($remove->res == "rash_2") {
        return redirect("/owned")->with('statusbad', $remove->msg);
      }
    }

    $sub =  $user_session["sub"];


    $delete_google =  $this->remove_google($sub, $email, $sub, $plan_id);


    if ($delete_google->res == "rash_2") {
      return redirect("/owned")->with(['statusbad' => $delete_google->msg, "bool" => false]);

    }
    $request->session()->forget("products");
    return redirect("/owned")->with(['status' => $delete_google->msg, "bool" => true]);
  }


  
  public function runner(Request $request, $script_name)
  {
    urlencode($script_name);

    $products = $request->session()->get('allproducts');
    $user_session = $request->session()->get('user_session');

    $ver = version::where('user_id', "=", $user_session["user_id"])->where("script_name", "=", $script_name)->first();

    

    $config = config_version::where("script_name", "=", $script_name)->orderBy("script_vr_number")->get();

    if(sizeof($config) == 0){
      return redirect("/product");
    }

    $is_thelast_version = true;
    $user_verion_config = $config[sizeof($config) - 1];
    if ($ver == null) {
      version::create([
        "user_id" => $user_session["user_id"],
        "script_name" => $config[sizeof($config) - 1]->script_name,
        "vr" => $config[sizeof($config) - 1]->script_vr_number,
      ]);
    } else {

      if ($ver->vr !=  $config[sizeof($config) - 1]->script_vr_number) {
        $is_thelast_version = false;
        $user_verion_config = config_version::where("script_vr_number", "=", $ver->vr)->where("script_name","=", $script_name)->first();
      }
    }




    if($script_name == "premium"){
      return redirect("/product");
     }



    $true_if_premum = [];
    for ($b=0; $b < count($products) ; $b++) { 
      if ($products[$b]["product_name"] == "premium") {
        if($products[$b]["owend"] == true) {
          for ($c=0; $c < count($products); $c++) { 
            array_push($true_if_premum,array_replace($products[$c], ['owend'=> true]));
          }
        }
      }
  
    }

    $finayl_array =[];
    $is_config_there ="";
    
    if (sizeof($true_if_premum) != 0) {
      for ($i = 0; $i < count($true_if_premum); $i++) {
      
        if($true_if_premum[$i]["product_name"] == $script_name)  {
    
           if($true_if_premum[$i]["owend"] == true) {
         
               array_push($finayl_array, $true_if_premum[$i]);
           }else{
                return redirect("/product");
           }
         }
     }
 
    }else{
      for ($i = 0; $i < count($products); $i++) {

        if($products[$i]["product_name"] == $script_name)  {
       
          if($products[$i]["owend"] == true) {
          
               array_push($finayl_array, $products[$i]);
           }else{
                return redirect("/product");
           }
         }
     }
 
    }
    // $userinfo = $request->session()->get("user_session");
   $get_config = $this->get_config(
    $user_session["email"],
    isset($userinfo["google"]) == true ? $user_session["google"] : null,
    $user_verion_config["script_name"],
    $user_session["user_id"],
    isset($user_session["google_id"]) == true ? $user_session["google_id"] : null,
    $user_session["username"],
    $user_session['phrase']);

   
  
    $botSatatus = 'offline';
      if ($get_config->msg == "no config yet") {
         $is_config_there= "nothing";
      }else{
        $botSatatus = explode(',', $get_config->msg)[1];
        $is_config_there = $get_config->userData;
      }
  


    return view("bot_sup", compact("finayl_array", "user_verion_config", "is_thelast_version","is_config_there", "botSatatus"));
  }
  public function runnerback()
  {
    return redirect("/product");
  }

  
  public function configrate(Request $request)
  {

   $userinfo = $request->session()->get("user_session");
   
   $config = $request->input("config");
   

     $config  = json_decode($config,false);

    FuncController::linkfilter($config->botName);

      $req =  $this->create_config($userinfo["email"],isset($userinfo["google"]) == true ? $userinfo["google"] : null,$config->config, $config->botName,$userinfo["user_id"],isset($userinfo["google_id"]) == true ? $userinfo["google_id"] : null, $userinfo["username"],$userinfo['phrase']);
      if($req->res == "rash_1"){
        return redirect("/runner/".$config->botName)->with(['status' => $req->msg, "bool" => true]);
      }else{
        return redirect("/runner/".$config->botName)->with(['statusbad' => $req->msg, "bool" => false]);
      }
    

  }


  public function update_script(Request $request)
  {
  $script_name = $request->validate([
      "script_name" => "required",

    ]);

    $config = config_version::where("script_name", "=", $script_name["script_name"])->orderBy("script_vr_number")->get();


    $user_session = $request->session()->get("user_session");
    

   $update_config =  $this->update_config(
    $user_session["email"],
    isset($user_session["google"]) == true ? $user_session["google"] : null,
    $script_name["script_name"],
    $user_session["user_id"],
    isset($user_session["google_id"]) == true ? $user_session["google_id"] : null,
    $user_session["username"],
    $user_session["phrase"]);
    
   if($update_config->res == "rash_1"){
    version::where("user_id",$user_session["user_id"])->where("script_name",$script_name["script_name"])->update(["vr" => (int)$config[sizeof($config) - 1]->script_vr_number]);
    return back()->with(['status' => $update_config->msg, "bool" => true]);
   }else{
    return back()->with(['statusbad' => $update_config->msg, "bool" => false]);
   }

 

   
  }
  public function run_script(Request $request)
  {

    $form = $request->validate([
      "script_name" => "required",
      "version" => "required",
      "msg" => "required"
    ]);
    $allproducts = $request->session()->get("allproducts"); 
   $user_session = $request->session()->get("user_session");

$plan_interval = "";
for ($i=0; $i < count($allproducts); $i++) { 
  if ($allproducts[$i]["product_name"] == "premium") {
    if($allproducts[$i]["owend"] == true) {

          $plan_interval =  $allproducts[$i]["plan_interval"];
        
    }
  }
    if($allproducts[$i]["product_name"] == $form["script_name"]){

          $plan_interval =  $allproducts[$i]["plan_interval"];
        
    }
  }

   $run_bot = $this->run_bot($user_session["user_id"],$form["version"],$form["script_name"],$plan_interval,$form["msg"]);


      if($run_bot->res == "rash_1"){
        return back()->with(['status' => $run_bot->msg, "bool" => true]);
      }elseif($run_bot->res == "rash_2"){
        return back()->with(['statusbad' => $run_bot->msg, "bool" => false]);
      }

    return redirect("/product");
  }
}
