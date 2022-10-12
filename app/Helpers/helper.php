<?php
namespace App\Helper;
use Illuminate\Support\Facades\Http;

class apireq{

    public function sentget($route,$body)
    {

      $response = Http::withHeaders([env("API_ADMIN_HEADER_APIKEY_KEY") => env("API_ADMIN_HEADER_APIKEY_VALUE")])->post(env("domain") . env("MAIN_ROUTE"). $route."?".env("API_ADMIN_QUERY_USERNAME_KEY")."=".env("API_ADMIN_QUERY_USERNAME_VALUE")."&".env("API_ADMIN_QUERY_PASSWORD_KEY")."=".env("API_ADMIN_QUERY_PASSWORD_VALUE")."&".env("API_ADMIN_QUERY_APIKEY_KEY"). "=" .env("API_ADMIN_QUERY_APIKEY_VALUE"),$body);


      return $response->object();

    }


    public function registeruser($username,$password,$repassword,$email){

    $register= $this->sentget("/users/regisetr", [$this->bodykey => $this->bodyvalue, "username" => $username , "password" => $password , "repassword" => $repassword , "email" => $email]);
    return $register;
    }
  /*  public function gg()
    {
       return env("domain") . env("MAIN_ROUTE"). "/wdwdhgwd"."?".env("API_ADMIN_QUERY_USERNAME_KEY")."=".env("API_ADMIN_QUERY_USERNAME_VALUE")."&".env("API_ADMIN_QUERY_PASSWORD_KEY")."=".env("API_ADMIN_QUERY_PASSWORD_VALUE")."&".env("API_ADMIN_QUERY_APIKEY_KEY")."=".env("API_ADMIN_QUERY_APIKEY_VALUE");

   }*/



}
trait httpfunc {
    public function sentget($route,$body)
    {
      $response = Http::withHeaders([env("API_ADMIN_HEADER_APIKEY_KEY") => env("API_ADMIN_HEADER_APIKEY_VALUE")])->post(env("domain") . env("MAIN_ROUTE"). $route."?".env("API_ADMIN_QUERY_USERNAME_KEY")."=".env("API_ADMIN_QUERY_USERNAME_VALUE")."&".env("API_ADMIN_QUERY_PASSWORD_KEY")."=".env("API_ADMIN_QUERY_PASSWORD_VALUE")."&".env("API_ADMIN_QUERY_APIKEY_KEY"). "=" .env("API_ADMIN_QUERY_APIKEY_VALUE"),$body);
      return $response->object();
    }
}


?>
