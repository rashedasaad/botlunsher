<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware("google");
    }
    public function index()
    {
        return view("update");
    }

    public function update($username, $password, $rePassword, $last_password, $email, $id)
    {
        $update = FuncController::sentget("/users/update", [env("API_ADMIN_BODY_APIKEY_KEY") => env("API_ADMIN_BODY_APIKEY_VALUE"), "username" => $username, "last_password" => $last_password, "password" => $password, "rePassword" => $rePassword, "email" => $email, "id" => $id]);
        return $update;
    }


    public function store(Request $request)
    {
        $user_session = $request->session()->get('user_session');

        $username =  $request->input("username");
     
        $password =   $request->input("newPasswrod");
        $confirm_password =  $request->input("confirm_password");
        $email =   $request->input("email");




        $form = $request->validate([
            "last_password" => "required",
        ]);


        if ($email != "") {

            if (FuncController::emailfilter($email) == "fail") {
                return redirect("/update")->with('statusbad', "The email is not vaild");
            }        

        }
        if ($form["last_password"] != "") {

            if (FuncController::passwordfilter($form["last_password"]) == "fail") {
                return redirect("/update")->with('statusbad', "The password is not vaild");
            }
        }
        if ($password != "") {

            if (FuncController::passwordfilter($password) == "fail") {
                return redirect("/update")->with('statusbad', "The password is not vaild");
            }
        }


     
        $username =  FuncController::xssfilter($username);
        $id = $user_session["user_id"];

        $update = $this->update($username, $password, $confirm_password, $form["last_password"], $email, $id);


        if ($update->res == "rash_2") {
            return redirect("/update")->with('statusbad', $update->msg);
        }

        return redirect()->route("home");
    }
}
