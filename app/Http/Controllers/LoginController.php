<?php

namespace App\Http\Controllers;

use App\Http\Middleware\login;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Cartalyst\Stripe\Api\Customers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{


    public function google()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callback(Request $request)
    {
        $google = Socialite::driver('google')->user();
       
      $is_google_good =   $this->googleauth($google->user["sub"], $google->id, $google->email, $google->name);
      
      if ($is_google_good->res == "rash_2") {
        return redirect("/login")->with('statusbad', $is_google_good->msg);
    };

        $request->session()->put("user_session", [
            "sub" => $google["sub"],
            "google_id" =>  $google->id,
            "user_id" => $is_google_good->userData->id_ququ,
            "username" => $is_google_good->userData->username_ququ,
            "email" => $is_google_good->userData->email_ququ,
            "is_ban" => $is_google_good->userData->is_ban,
            "customer_id" => $is_google_good->userData->stripe_id,
            "google" => true,
            "phrase" => $is_google_good->userData->phrase,
        ]);

   
        $request->session()->forget('products');
        return redirect('/product');
    }

    public function index()
    {
        return view("login");
    }

    public function forgetpasswordpage()
    {
        return view("forgetpassword");
    }

    public function loginpost($username_or_email, $password)
    {
        $login = FuncController::sentget("/users/login", [env("API_ADMIN_BODY_APIKEY_KEY") => env("API_ADMIN_BODY_APIKEY_VALUE"), "username_or_email" => $username_or_email, "password" => $password]);
        return $login;
    }
    public function googleauth($sup, $id, $email, $username)
    {
        $auth_google = FuncController::sentget("/goglo/users/auth", [env("API_ADMIN_BODY_APIKEY_KEY") => env("API_ADMIN_BODY_APIKEY_VALUE"), "sup" => $sup, "email" => $email, "id" => $id, "username" => $username]);
        return $auth_google;
    }

    public function forgetpassword($email)
    {
        $forgetpass = FuncController::sentget("/users/forget_pass", [env("API_ADMIN_BODY_APIKEY_KEY") => env("API_ADMIN_BODY_APIKEY_VALUE"), "kolkey" => env("KOL_KEY"), "bolkey" => env("BOL_KEY"), "tolkey" => env("TOL_KEY"), "email" => $email]);
        return $forgetpass;
    }

    public function store(Request $request)
    {
        $request->validate([
            "loginusername" => "required",
            "loginpassword" => "required",
            'g-recaptcha-response' => 'recaptcha'
        ]);

        $username_or_email =  $request->input("loginusername");
        $password =   $request->input("loginpassword");

        if (FuncController::passwordfilter($password) == "fail") {
            return redirect("/login")->with('statusbad', "The password is not correct");
        }

        $login = $this->loginpost($username_or_email, $password);

        if ($login->res == "rash_2") {
            return redirect("/login")->with('statusbad', $login->msg);
        };

        if ($login->userData->is_ban == 1) {
            return redirect("/login")->with('statusbad', "sorry you are band");
        };


        $request->session()->put("user_session", [
            "sup" => null,
            "user_id" => $login->userData->id_ququ,
            "username" => $login->userData->username_ququ,
            "email" => $login->userData->email_ququ,
            "is_ban" => $login->userData->is_ban,
            "customer_id" => $login->userData->stripe_id,
            "google" => false,
            "phrase" => $login->userData->phrase,
        ]);

        $request->session()->forget('products');
        return redirect('/product');
    }

    public function storeforgetpassword(Request $request)
    {
        $request->validate([
            "email" => "required",
            'g-recaptcha-response' => 'recaptcha'
        ]);


        $email =   $request->input("email");

        if (FuncController::emailfilter($email) == "fail") {
            return redirect("/forgetpassword")->with('statusbad', "The email is not vaild");
        }

        $email =  FuncController::xssfilter($email);


        $forgetpass =  $this->forgetpassword($email);

        if ($forgetpass->res == "rash_2") {
            return redirect("/")->with('statusbad', $forgetpass->msg);
        }
        return redirect("/product")->with('status', $forgetpass->msg);
    }
}
