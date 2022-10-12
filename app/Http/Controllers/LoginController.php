<?php

namespace App\Http\Controllers;


use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Http\Request;
Use App\Models\User;
use Cartalyst\Stripe\Api\Customers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{


    public function index()
    {
        return view("login");
    }

    public function forgetpasswordpage(){
        return view("forgetpassword");
    }

    public function loginpost($username_or_email, $password)
    {

        $login = FuncController::sentget("/users/login", [env("API_ADMIN_BODY_APIKEY_KEY") => env("API_ADMIN_BODY_APIKEY_VALUE"), "username_or_email" => $username_or_email, "password" => $password]);
        return $login;
    }
    public function forgetpassword($email){
        $forgetpass = FuncController::sentget("/users/forget_pass", [env("API_ADMIN_BODY_APIKEY_KEY") => env("API_ADMIN_BODY_APIKEY_VALUE"), "kolkey" => env("KOL_KEY"), "bolkey" => env("BOL_KEY"), "tolkey" => env("TOL_KEY"), "email" => $email]);
        return $forgetpass;
    }

    public function store(Request $request)
    {

        $request->validate([
            "username_or_email" => "required",
            "password" => "required",
        ]);

        $username_or_email =  $request->input("username_or_email");
        $password =   $request->input("password");


        $login = $this->loginpost($username_or_email, $password);

        if ($login->res == "rash_2") {
            return redirect("/")->with('statusbad', $login->msg);
        };
        
        if ($login->userData->is_ban == 1) {
            return redirect("/login")->with('statusbad', "sorry you are band");
        };


        $request->session()->put("user_session", [
            "user_id" => $login->userData->id_ququ,
            "username" => $login->userData->username_ququ,
            "email" => $login->userData->email_ququ,
            "is_ban" => $login->userData->is_ban,
            "customer_id" => $login->userData->stripe_id
        ]);

        $request->session()->forget('products');



        return redirect('/');
    }

    public function storeforgetpassword(Request $request){

        $email =   $request->input("email");

       $forgetpass =  $this->forgetpassword($email);
        if($forgetpass->res == "rash_2"){
         return redirect("/")->with('statusbad', $forgetpass->msg);
        }
        return redirect("/")->with('status',$forgetpass->msg);



    }
}
