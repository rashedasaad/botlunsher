<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class VerifictionController extends Controller
{
    public function index($code_link)
    {
        $code_link = urlencode($code_link);
        return view("verifiy", compact("code_link"));
    }
    public function registeruser($username, $password, $repassword, $email)
    {
        $register = FuncController::sentget("/users/regisetr", [env("API_ADMIN_BODY_APIKEY_KEY") => env("API_ADMIN_BODY_APIKEY_VALUE"), "username" => $username, "password" => $password, "rePassword" => $repassword, "email" => $email]);
        return $register;
    }

    public function store(Request $request,$codelink)
    {
        $request->validate([
            "code" => "required",
        ]);

        $code =  $request->input("code");

         urldecode($codelink);
    
         FuncController::linkfilter($codelink);

        $user = User::where('code_link', $codelink)->first();

        if ($user->code == $code) {

            $sa =  $this->registeruser(FuncController::xssfilter($user->name), $user->password, $user->password,FuncController::xssfilter($user->email));

            if ($sa->res == "rash_2") {
                return redirect("/")->with('statusbad', $sa->msg);
            }
            return redirect("/login")->with('status', $sa->msg);
        } else {
            return redirect("/login")->with('statusbad', "The verifiy code is not vaild");
        };
    }
}
