<?php

namespace App\Http\Controllers;

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

    $showpproducts = FuncController::sentget("/scripts/view/get_all", [env("API_ADMIN_BODY_APIKEY_KEY") => env("API_ADMIN_BODY_APIKEY_VALUE"), "customer_id" => $customer_id]);
    $request->session()->put("products", ["products" => $showpproducts->userData]);

    $products = $request->session()->get('products');
    $responses = $products["products"];


    $rearrays = [];
    for ($i = 0; $i < count($responses); $i++) {

      if ($responses[$i]->owned == true) {
        array_push($rearrays, $responses[$i]);
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
    $register = FuncController::sentget("/sup/remove", [env("API_ADMIN_BODY_APIKEY_KEY") => env("API_ADMIN_BODY_APIKEY_VALUE"), "plan_id" => $plan_id, "user_id" => $user_id, "password" => $password]);
    return $register;
  }


  public function store(Request $request,$plan_id)
  {
    $user = $request->session()->get('user_session');
    $user_id = $user["user_id"];

    $request->validate([
      "password" => "required",
      'g-recaptcha-response' => 'recaptcha'
    ]);
    $password =  $request->input("password");




    if (FuncController::passwordfilter($password) == "fail") {
      return redirect("/owned")->with('statusbad', "The password is not invaild");
  }
    $remove = $this->remove($plan_id, $user_id, $password);
    if ($remove->res == "rash_1") {
      return redirect("/owned")->with('status', $remove->msg);
    } elseif ($remove->res == "rash_2") {
      return redirect("/owned")->with('statusbad', $remove->msg);
    }
  }
}
