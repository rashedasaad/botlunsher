<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class passwordBackController extends Controller
{
    public function index()
    {


        return view("Resetpassword", compact("path"));
    }
    public function passbak($password, $rePassword, $path, $verify_code)
    {
        $forgetpass = FuncController::sentget("/users/back", [env("API_ADMIN_BODY_APIKEY_KEY") => env("API_ADMIN_BODY_APIKEY_VALUE"), "kalkey" => env("KAL_KEY"), "balkey" => env("BAL_KEY"), "talkey" => env("TAL_KEY"), "new_password" => $password, "new_re_password" => $rePassword, "path" => $path, "code" => $verify_code]);
        return $forgetpass;
    }
    public function cancle($path)
    {
        $cancle = FuncController::sentget("/users/pass_not_me", [env("API_ADMIN_BODY_APIKEY_KEY") => env("API_ADMIN_BODY_APIKEY_VALUE"), "path" => $path]);
        return $cancle;
    }
    public function store(Request $request, $path)
    {
        $request->validate([
            "password" => "required",
            "rePassword" => "required",
            "verify_code" => "required"
          ]);
        $password =  $request->input("password");
        $rePassword =   $request->input("rePassword");
        $verify_code =   $request->input("verify_code");
        $path = FuncController::linkfilter($path);
        $path = urlencode($path);
        if(gettype($verify_code) != "integer"){
        return redirect("/user/auth/take/" . $path)->with('statusbad', "the verify code is not right");
        }
 
        if ($password != $rePassword) {
            return redirect("/user/auth/take/" . $path)->with('statusbad', "the password do not match");
        }
        if (FuncController::passwordfilter($password) == "good") {

            $pass = $this->passbak($password, $rePassword, $path, $verify_code);

            if ($pass->res == "rash_2") {
                return redirect("/user/auth/take/" . $path)->with('statusbad', $pass->msg);
            }
            return redirect("/user/auth/take/" . $path)->with('status', $pass->msg);
        }
    }
    public function back($path)
    {
        $cancle = $this->cancle($path);
        if ($cancle->res == "rash_1") {
            return redirect("/")->with('status', $cancle->msg);
        }
    }
}
