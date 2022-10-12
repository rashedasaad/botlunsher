<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class passwordBackController extends Controller
{
    public function index($path){
        $path = urlencode($path);
        return view("passbak",compact("path"));
    }
    public function passbak($password,$rePassword,$path,$verify_code){
        $forgetpass = FuncController::sentget("/users/back", [env("API_ADMIN_BODY_APIKEY_KEY") => env("API_ADMIN_BODY_APIKEY_VALUE"), "kalkey" => env("KAL_KEY"), "balkey" => env("BAL_KEY"), "talkey" => env("TAL_KEY"), "new_password" => $password,"new_re_password" => $rePassword,"path" => $path,"code" => $verify_code]);
        return $forgetpass;
    }
    public function cancle($path){
        $cancle = FuncController::sentget("/users/pass_not_me", [env("API_ADMIN_BODY_APIKEY_KEY") => env("API_ADMIN_BODY_APIKEY_VALUE"),"path" => $path]);
        return $cancle;
    }
    public function store(Request $request){
        $request->validate([
            "password" => "required",
            "rePassword" => "required",
            "verify_code" => "required",
            "path" => "required"
        ]);

        $password =  $request->input("password");
        $rePassword =   $request->input("rePassword");
        $verify_code =   $request->input("verify_code");
        $pathpass =   $request->input("path");

        if (FuncController::passwordfilter($password) == "good" && FuncController::passwordfilter($rePassword) == "good") {
            
        $pass = $this->passbak($password,$rePassword,$pathpass,$verify_code);

        if($pass->res == "rash_2"){
            return redirect("/")->with('statusbad', $pass->msg);
           }
           return redirect("/")->with('status',$pass->msg);
        }
    
        
        



    }
    public function back($path){
        $cancle = $this->cancle($path);
        if($cancle->res == "rash_1"){
            return redirect("/")->with('status',$cancle->msg);
        }
      

    }
}
