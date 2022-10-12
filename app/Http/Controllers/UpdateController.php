<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UpdateController extends Controller
{
    

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
        $last_password =  $request->input("last_password");
        $password =   $request->input("password");
        $rePasswrod =  $request->input("rePasswrod");
        $email =   $request->input("email");


        $request->validate([
            "last_password" => "required",
        ]);

        $id = $user_session["user_id"];

        $update = $this->update($username, $password, $rePasswrod, $last_password, $email, $id);


        if ($update->res == "rash_2") {
            return redirect("/")->with('statusbad', $update->msg);
        }

        return redirect()->route("home");
    }
}
