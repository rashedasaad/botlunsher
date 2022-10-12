<?php

namespace App\Http\Controllers;

use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Http\Request;
use App\Models\subscription;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{

    public function index(Request $request, $name,$plan)
    {

        $name = urlencode($name);
        $plan = urlencode($plan);
        return view("stripe", compact("name", "plan"));
    }

    public function getProduct(Request $request){
        $request->validate([
            "interval" => "required",
            "productname" => "required"
        ]);
        
        $interval =  $request->input("interval");
        $productname =   $request->input("productname");
        
        return redirect("/payment/".$productname."/".$interval);
    }

    public function card($customer_id, $user_id, $product_id, $plan_id, $email, $token_id, $zip_code, $country, $city)
    {
        $card= FuncController::sentget("/sup/give", [env("API_ADMIN_BODY_APIKEY_KEY") => env("API_ADMIN_BODY_APIKEY_VALUE"), "customer_id" => $customer_id, "user_id" => $user_id, "product_id" => $product_id, "plan_id" => $plan_id, "email" => $email, "token_id" => $token_id, "zip_code" => $zip_code, "country" => $country, "city" => $city]);
        return $card;
    }

    public function store(Request $request)
    {
        $user = $request->session()->get('user_session');
      
        $customer_id = $user["customer_id"];
        $email = $user["email"];
        $user_id = $user["user_id"];
        $request->validate([
            "product_name" => "required",
            "plan" => "required",
            "stripeToken" => "required"
        ]);

        $product_name =  $request->input("product_name");
        $plan =   $request->input("plan");
        $stripeToken =   $request->input("stripeToken");

    
    $getip = file_get_contents("http://ip-api.com/json/" .FuncController::getUserIpAddr());
          $getip =json_decode($getip);
     

        $cad  = $this->card($customer_id, $user_id, $product_name, $plan, $email,$stripeToken, $getip->zip, $getip->countryCode,  $getip->city);

         if ($cad->res == "rash_1") {
            $request->session()->forget('products');
            return redirect("/card");
         }elseif($cad->res == "rash_2") {
            return $cad->msg;
         }

    }
}
