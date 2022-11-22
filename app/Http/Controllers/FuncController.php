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
    $danger = array("<", ">", "/", "src", "select", "*", "<script>", "%", "&");
    $xss_filter = str_replace($danger, "", $str);
    return  $xss_filter;
  }

  public static  function linkfilter($str)
  {
    $danger = array("<", ">", "/", "*", "<script>", "%", "&");
    $xss_filter = str_replace($danger, "", $str);
    return  $xss_filter;
  }

  
}
