<?php

namespace App\Http\Controllers;

use App\Models\config_version;
use App\Models\version;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class AllProcductController extends Controller
{
  

  public function showpproduct(Request $request)
  {



    if ($request->session()->get('user_session')) {
      if (!$request->session()->get('products')) {
        $user = $request->session()->get('user_session');
        $customer_id = $user["customer_id"];
        $array_includs = [];
        $dbconfig = [];

        $showpproducts = FuncController::sentget("/scripts/view/get_all", [env("API_ADMIN_BODY_APIKEY_KEY") => env("API_ADMIN_BODY_APIKEY_VALUE"), "customer_id" => $customer_id, "version_nums" => []]);
        $freescripts = FuncController::sentget("/scripts/view/get_all_free", [env("API_ADMIN_BODY_APIKEY_KEY") => env("API_ADMIN_BODY_APIKEY_VALUE")]);



        $merge = array_merge($showpproducts->userData, $freescripts->userData);

        $is_new_recourd_found = false;
        $is_zero = false;
        $config_db_verion = [];
        $includs = [];
        $config_versions =  config_version::all();
        if (sizeof($config_versions) == 0) {
          for ($a = 0; $a < count($merge); $a++) {

            for ($b = 0; $b < count($merge[$a]->versions); $b++) {
              $is_zero = true;
              $is_new_recourd_found = true;
              if (in_array($merge[$a]->product_name . "---!!!___" . $merge[$a]->versions[$b]->v_n, $includs)) {
                continue;
              }
              array_push($includs, $merge[$a]->product_name . "---!!!___" . $merge[$a]->versions[$b]->v_n);
              array_push($config_db_verion, ["html_config" =>  $merge[$a]->versions[$b]->config, "script_name" => $merge[$a]->product_name, "script_vr_number" => $merge[$a]->versions[$b]->v_n]);
            }
          }
        
         


          if ($is_new_recourd_found = true) {
            config_version::insert($config_db_verion);
          }



        }else{
          $includs = [];
          $included_array = [];
          $config_db_version = [];

          for ($i=0; $i < count($config_versions) ; $i++) { 
            array_push($included_array,$config_versions[$i]->script_name . "---!!!___" . $config_versions[$i]->script_vr_number);

          }
          for ($c=0; $c < count($merge) ; $c++) { 
            for ($b = 0; $b < count($merge[$c]->versions); $b++) {
              if (in_array($merge[$c]->product_name . "---!!!___" . $merge[$c]->versions[$b]->v_n, $included_array)) {
                continue;
              }
              if (in_array($merge[$c]->product_name . "---!!!___" . $merge[$c]->versions[$b]->v_n, $includs)) {
                continue;
              }
              array_push($includs, $merge[$c]->product_name . "---!!!___" . $merge[$c]->versions[$b]->v_n);
              array_push($config_db_version, ["html_config" =>  $merge[$c]->versions[$b]->config, "script_name" => $merge[$c]->product_name, "script_vr_number" => $merge[$c]->versions[$b]->v_n]);
            }
          }

          if(sizeof($config_db_version) != 0){

            config_version::insert($config_db_version);
            
          }
        
          
        
        }
       

        for ($i = 0; $i < count($merge); $i++) {
          unset($merge[$i]->versions);
        }




        $request->session()->put("products", ["products" => $merge]);
      }
 
      $products = $request->session()->get('products');
      $responses = $products["products"];


      $year = [];
      $month = [];
      $free = [];
      $storges = [];
      $rearrays = [];
      for ($i = 0; $i < count($responses); $i++) {
        if (isset($responses[$i]->interval) != false) {
          if ($responses[$i]->interval == "year") {
            array_push($year, $responses[$i]);
          }
          if ($responses[$i]->interval == "month") {
            array_push($month, $responses[$i]);
          }
        } else {
          array_push($free, $responses[$i]);
        }
      }

      for ($i = 0; $i < count($year); $i++) {
        for ($m = 0; $m < count($month); $m++) {


          if ($year[$i]->product_name == $month[$m]->product_name) {
   
            if ($year[$i]->owned == true) {
              array_push($storges,  ["owend" => $year[$i]->owned,"plan_interval" => $year[$i]->plan_id, "product_name" => $month[$m]->product_name, "year_plan" => $year[$m]->plan_id, "month_plan" => $month[$m]->plan_id,"product_id" => $month[$m]->product_id, "details" => $month[$m]->details, "year_price" => $year[$i]->price, "month_price" => $month[$m]->price, "img" => $month[$m]->img, "vid" => $month[$m]->vid]);
            } elseif ($month[$i]->owned == true) {
              array_push($storges,  ["owend" => $month[$m]->owned,"plan_interval" => $month[$m]->plan_id, "owend" => $month[$m]->owned,"product_name" => $month[$m]->product_name, "year_plan" => $year[$m]->plan_id, "month_plan" => $month[$m]->plan_id,"product_id" => $month[$m]->product_id, "details" => $month[$m]->details, "year_price" => $year[$i]->price, "month_price" => $month[$m]->price, "img" => $month[$m]->img, "vid" => $month[$m]->vid]);
            } else {
              array_push($storges,  ["owend" => false, "plan_interval" => "nothing", "product_name" => $month[$m]->product_name,"year_plan" => $year[$m]->plan_id, "month_plan" => $month[$m]->plan_id, "product_id" => $month[$m]->product_id, "details" => $month[$m]->details, "year_price" => $year[$i]->price, "month_price" => $month[$m]->price, "img" => $month[$m]->img, "vid" => $month[$m]->vid]);
            }
        
          }
        }
      }
      for ($d = 0; $d < count($free); $d++) {
        if ($free[$d]->owned == true) {
          array_push($storges,  ["owend" => $free[$d]->owned, "plan_interval" => $free[$d]->plan_id, "product_name" => $free[$d]->product_name,  "product_id" =>"free" , "details" => $free[$d]->details, "img" => $free[$d]->img, "vid" => $free[$d]->vid]);
        }
      }



      $request->session()->put("allproducts", $storges);
     
      return view("menu", compact("storges"));
    }
  }
  

  public function show(Request $request, $product)
  {


    $products = $request->session()->get('allproducts');
    

    $shows = [];


    for ($s = 0; $s < count($products); $s++) {

  
      if ($products[$s]["product_id"] == $product) {
        if ($products[$s]["product_id"] == "free") {
          return redirect("/product")->with(['status' => "This script is free", "bool" => false]);
        
        }
        if($products[$s]["product_name"] == "premium") {
          if ($products[$s]["owend"] == true) {
            return redirect("/product")->with(['status' => "You have a premium", "bool" => false]);
          }
        }
        if ($products[$s]["owend"] != true) {
          array_push($shows, $products[$s]);
        }
      }
 
    }


    return view("product", compact("shows"));
  }
}
