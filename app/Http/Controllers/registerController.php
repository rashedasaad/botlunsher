<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Mail\verfiy;
use Illuminate\Support\Facades\Mail;

class registerController extends Controller
{
    public function index()
    {
        return view("register");
    }




    public function usercheck($username, $email,$password)
    {

        $register = FuncController::sentget("/users/check", [env("API_ADMIN_BODY_APIKEY_KEY") => env("API_ADMIN_BODY_APIKEY_VALUE"), "username" => $username, "email" => $email, "password" => $password]);
        return $register;
    }


    public function store(Request $request)
    {
        $username =  $request->input("username");
        $email =   $request->input("email");
        $password =   $request->input("passwordone");
        $repassword =   $request->input("repassword");


        $request->validate([
            "username" => "required",
            "email" => "required",
            "passwordone" => "required",
            "repassword" => "required"
        ]);



        if ($password != $repassword) {
            return redirect("/")->with('statusbad', "the password is not the same");
        }
        if (FuncController::passwordfilter($password) == "fail" && FuncController::passwordfilter($repassword) == "fail") {
            return redirect("/")->with('statusbad', "The password is not strong");
        }
        if (FuncController::username($username) == "fail") {
            return redirect("/")->with('statusbad', "the are is big");
        }
        if (strlen($username) > 30) {
            return redirect("/")->with('statusbad', "the username is big");
        }
        if (strlen($username) < 4) {
            return redirect("/")->with('statusbad', "the username is small");
        }
        if (strlen($password) > 30) {
            return redirect("/")->with('statusbad', "the password is big");
        }
        if (strlen($password) < 8) {
            return redirect("/")->with('statusbad', "the password small it mast be biggar an 4");
        }
        if (FuncController::emailfilter($email) == "good") {
      
            $usercheck =  $this->usercheck($username, $email, $password);
 
            if ($usercheck->res == "rash_1") {
                $request->session()->put("verfiy", [
                    "code_link" => FuncController::generateToken(125),
                    "code" =>  FuncController::generatenumber(6)
                ]);

                $verfiy = $request->session()->get('verfiy');
                $ver = $verfiy["code_link"];
                $code = $verfiy["code"];

                $SS = User::updateOrCreate(
                    [
                        'email' => $email,
                    ],
                    [

                        'name' => $username,
                        "password" =>  $password,
                        "code_link" => $ver,
                        "code" => $code
                    ]
                );

                $data = [
                    "subject" => "botluncher",
                    "code_link" => "http://localhost:8000/user/verifiy/".$ver,
                    "body" => $code
                ];


                try {
                    Mail::to($email)->send(new verfiy($data));
                } catch (\Throwable $th) {
                    return response()->json(["sorry there was a problem and we cannat complit the prossece"]);
                }
                
            }
        }
        return redirect("/")->with('statusbad', "the username is small");


        /*
        $sa =  $this->registeruser($username, $password, $repassword, $email);

        if ($sa->res == "rash_2") {
            return redirect("/")->with('statusbad', $sa->msg);
        }
        return redirect("/")->with('status', $sa->msg);
        */
    }
}
