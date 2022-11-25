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

    $year = [];
    $month = [];
    $storges = [];
    $rearrays = [];
    for ($i = 0; $i < count($responses); $i++) {
      if ($responses[$i]->interval == "year") {
        array_push($year, $responses[$i]);
      }
      if ($responses[$i]->interval == "month") {
        array_push($month, $responses[$i]);
      }
    }

    for ($i = 0; $i < count($year); $i++) {
      for ($m = 0; $m < count($month); $m++) {
        if ($year[$i]->product_name == $month[$m]->product_name) {
          if ($year[$i]->owned == true) {
            array_push($storges,  ["owend" => $year[$i]->owned, "product_name" => $month[$m]->product_name,"product_id" => $month[$m]->product_id, "details" => $month[$m]->details, "year_price" => $year[$i]->price, "month_price" => $month[$m]->price,"img" => $month[$m]->img,"vid" => $month[$m]->vid]);
          } elseif ($month[$i]->owned == true) {
            array_push($storges,  ["owend" => $month[$m]->owned, "product_name" => $month[$m]->product_name,"product_id" => $month[$m]->product_id, "details" => $month[$m]->details, "year_price" => $year[$i]->price, "month_price" => $month[$m]->price,"img" => $month[$m]->img,"vid" => $month[$m]->vid]);
          } else {
            array_push($storges,  ["owend" => false, "product_name" => $month[$m]->product_name,"product_id" => $month[$m]->product_id, "details" => $month[$m]->details, "year_price" => $year[$i]->price, "month_price" => $month[$m]->price,"img" => $month[$m]->img,"vid" => $month[$m]->vid]);
          }
        }
      }
    }





    return view("menu", compact("storges"));
  }

  public function show(Request $request, $product)
  {


    $products = $request->session()->get('products');
    $products = $products["products"];

    $year = [];
    $month = [];
    $storges = [];
    $rearrays = [];
    for ($i = 0; $i < count($products); $i++) {
      if ($products[$i]->interval == "year") {
        array_push($year, $products[$i]);
      }
      if ($products[$i]->interval == "month") {
        array_push($month, $products[$i]);
      }
    }

    for ($i = 0; $i < count($year); $i++) {
      for ($m = 0; $m < count($month); $m++) {
        if ($year[$i]->product_name == $month[$m]->product_name) {
          if ($year[$i]->owned == true) {
            array_push($storges,  ["owend" => $year[$i]->owned, "product_name" => $month[$m]->product_name,"product_id" => $month[$m]->product_id, "details" => $month[$m]->details, "year_price" => $year[$i]->price, "month_price" => $month[$m]->price,"img" => $month[$m]->img]);
          } elseif ($month[$i]->owned == true) {
            array_push($storges,  ["owend" => $month[$m]->owned, "product_name" => $month[$m]->product_name,"product_id" => $month[$m]->product_id, "details" => $month[$m]->details, "year_price" => $year[$i]->price, "month_price" => $month[$m]->price,"img" => $month[$m]->img]);
          } else {
            array_push($storges,  ["owend" => false, "product_name" => $month[$m]->product_name,"product_id" => $month[$m]->product_id, "details" => $month[$m]->details, "price" => [$year[$i]->price,  $month[$m]->price],"img" => $month[$m]->img,  "year" => $year[$i]->plan_id,  "month" => $month[$m]->plan_id]);
          }
        }
      }
    }
    $shows = [];

    

    for ($s=0; $s < count($storges); $s++) { 
      if ($storges[$s]["product_id"] == $product) {
        if($storges[$s]["owend"] == 0){
          array_push($shows, $storges[$s]);
        }else{
         return redirect("/product");
        }
      }
    }




    return view("product", compact("shows"));
  }
}
