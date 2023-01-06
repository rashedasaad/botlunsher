<?php

namespace App\Http\Controllers;;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class FuncController extends Controller
{

  public static function sentget($route, $body)
  {
    
    $response = Http::withHeaders([env("API_ADMIN_HEADER_APIKEY_KEY") => env("API_ADMIN_HEADER_APIKEY_VALUE")])->post(env("domain") . env("MAIN_ROUTE") . $route . "?" . env("API_ADMIN_QUERY_USERNAME_KEY") . "=" . env("API_ADMIN_QUERY_USERNAME_VALUE") . "&" . env("API_ADMIN_QUERY_PASSWORD_KEY") . "=" . env("API_ADMIN_QUERY_PASSWORD_VALUE") . "&" . env("API_ADMIN_QUERY_APIKEY_KEY") . "=" . env("API_ADMIN_QUERY_APIKEY_VALUE"), $body);
    return $response->object();
  }

  public static function getUserIpAddr()
  {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
      //ip from share internet
      $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      //ip pass from proxy
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
      $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
  }

  public static function generateToken($length)
  {
    $allowedCharacters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $token = '';
    $allowedCharactersLength = mb_strlen($allowedCharacters, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
      $token .= $allowedCharacters[random_int(0, $allowedCharactersLength)];
    }
    return $token;
  }
  public static function generatenumber($length)
  {
    $allowedCharacters = '0123456789';
    $token = '';
    $allowedCharactersLength = mb_strlen($allowedCharacters, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
      $token .= $allowedCharacters[random_int(0, $allowedCharactersLength)];
    }
    return $token;
  }
  public static  function username($str)
  {
    $re = '/^(?=[a-zA-Z0-9_]{4,30}$)(?!.*[_]{2})[^_].*[^_]$/';

    if (preg_match($re, $str, $matches, PREG_OFFSET_CAPTURE, 0) == true) {
      return "good";
    } else {
      return "fail";
    }
  }
  public static  function emailfilter($str)
  {
    $re = '/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';


    if (preg_match($re, $str, $matches, PREG_OFFSET_CAPTURE, 0) == true) {
      return "good";
    } else {
      return "fail";
    }
  }
  public static  function passwordfilter($str)
  {
    $re = '/^(?=.*[A-Z].*[A-Z])(?=.*[!@#$&*])(?=.*[0-9].*[0-9])(?=.*[a-z].*[a-z].*[a-z]).{8,30}$/';

    if (preg_match($re, $str, $matches, PREG_OFFSET_CAPTURE, 0) == true) {
      return "good";
    } else {
      return "fail";
    }
    
  }
  public static  function xssfilter($str)
  {
    $danger = array("<", ">", "/", "src", "select", "*", "<script>", "%", "&","?","=","(", ")");
    $xss_filter = str_replace($danger, "", $str);
    return  $xss_filter;
  }

  public static function linkfilter($str)
  {
    $danger = array("<", ">","(", ")", "/","!","?","=","*", "<script>", "%", "&");
    $xss_filter = str_replace($danger, "", $str);
    return  $xss_filter;
  }


  public static function createproductsession(Request $request){

    $pro = $request->session()->get("products");
    if (!$pro) {
      $user = $request->session()->get('user_session');
      $customer_id = $user["customer_id"];
      $showpproducts = FuncController::sentget("/scripts/view/get_all", [env("API_ADMIN_BODY_APIKEY_KEY") => env("API_ADMIN_BODY_APIKEY_VALUE"), "customer_id" => $customer_id, "version_nums" => []]);
      $freescripts = FuncController::sentget("/scripts/view/get_all_free", [env("API_ADMIN_BODY_APIKEY_KEY") => env("API_ADMIN_BODY_APIKEY_VALUE")]);
      $merge = array_merge($showpproducts->userData, $freescripts->userData);

      for ($i = 0; $i < count($merge); $i++) {
        unset($merge[$i]->versions);
      }

       $productssestion = $request->session()->put("products", ["products" => $merge]);

       $pro = $request->session()->get("products");
      $responses = $pro["products"];


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
              array_push($storges,  ["owend" => $year[$i]->owned, "product_name" => $month[$m]->product_name, "year_plan" => $year[$m]->plan_id, "month_plan" => $month[$m]->plan_id,"product_id" => $month[$m]->product_id, "details" => $month[$m]->details, "year_price" => $year[$i]->price, "month_price" => $month[$m]->price, "img" => $month[$m]->img, "vid" => $month[$m]->vid]);
            } elseif ($month[$i]->owned == true) {
              array_push($storges,  ["owend" => $month[$m]->owned, "product_name" => $month[$m]->product_name, "year_plan" => $year[$m]->plan_id, "month_plan" => $month[$m]->plan_id,"product_id" => $month[$m]->product_id, "details" => $month[$m]->details, "year_price" => $year[$i]->price, "month_price" => $month[$m]->price, "img" => $month[$m]->img, "vid" => $month[$m]->vid]);
            } else {
              array_push($storges,  ["owend" => false, "product_name" => $month[$m]->product_name,"year_plan" => $year[$m]->plan_id, "month_plan" => $month[$m]->plan_id, "product_id" => $month[$m]->product_id, "details" => $month[$m]->details, "year_price" => $year[$i]->price, "month_price" => $month[$m]->price, "img" => $month[$m]->img, "vid" => $month[$m]->vid]);
            }
          }
        }
      }
      for ($d = 0; $d < count($free); $d++) {
        if ($free[$d]->owned == true) {
          array_push($storges,  ["owend" => $free[$d]->owned, "product_name" => $free[$d]->product_name,  "product_id" =>"free" , "details" => $free[$d]->details, "img" => $free[$d]->img, "vid" => $free[$d]->vid]);
        }
      }

      $request->session()->put("allproducts", $storges);


    }

  }
}
