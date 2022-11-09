<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class AllProcductController extends Controller
{


  public function showpproduct(Request $request)
  {
    if ($request->session()->get('user_session')) {
      $user = $request->session()->get('user_session');
      $customer_id = $user["customer_id"];
    }



    if (!$request->session()->get('user_session')) {
      
      if (!$request->session()->get('products')) {
        $request->session()->forget("products");
        $showpproducts = FuncController::sentget("/scripts/view/get_all", [env("API_ADMIN_BODY_APIKEY_KEY") => env("API_ADMIN_BODY_APIKEY_VALUE")]);
        $request->session()->put("products", ["products" => $showpproducts->userData]);
      }

    } elseif ($request->session()->get('user_session')) {
      
      if (!$request->session()->get('products')) {
        $showpproducts = FuncController::sentget("/scripts/view/get_all", [env("API_ADMIN_BODY_APIKEY_KEY") => env("API_ADMIN_BODY_APIKEY_VALUE"), "customer_id" => $customer_id]);
        $request->session()->put("products", ["products" => $showpproducts->userData]);
      }


    }

    $products = $request->session()->get('products');
    $responses = $products["products"];

    $rearrays = [];
    for ($i = 0; $i < count($responses); $i++) {

      if ($responses[$i]->interval == "month") {
        array_push($rearrays, $responses[$i]);
      }
    }





    return view("menu", compact("rearrays"));
  }

  public function show(Request $request, $product)
  {


    $products = $request->session()->get('products');
    $products = $products["products"];


    $shows = [];

    for ($i = 0; $i < count($products); $i++) {
      if ($products[$i]->product_name == $product) {
        array_push($shows, $products[$i]);
      }
    }

    return view("product", compact("shows"));
  }
}
