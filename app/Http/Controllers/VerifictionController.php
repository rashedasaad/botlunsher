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

    public function store(Request $request)
    {
        $request->validate([
            "code" => "required",
            "code_link" => "required",

        ]);
        $code =  $request->input("code");
        $code_link =   $request->input("code_link");

        $user = User::where('code_link', $code_link)->first();

        if ($user->code == $code) {

            $sa =  $this->registeruser($user->name, $user->password, $user->password, $user->email);

            if ($sa->res == "rash_2") {
                return redirect("/")->with('statusbad', $sa->msg);
            }
            return redirect("/")->with('status', $sa->msg);
        } else {
            return "not vaild";
        };
    }
}
