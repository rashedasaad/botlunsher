<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DeleteController extends Controller
{


    
    public function index(){
        return view("delete");
    }

    public function indexdownload(){
        return view("ban");
    }

    public function delete($password,$id){

        $register= FuncController::sentget("/users/delete", [env("API_ADMIN_BODY_APIKEY_KEY") => env("API_ADMIN_BODY_APIKEY_VALUE"), "password" => $password, "id" => $id]);
        return $register;
        }
    public function ban($id){

        $register= FuncController::sentget("/users/is_ban", [env("API_ADMIN_BODY_APIKEY_KEY") => env("API_ADMIN_BODY_APIKEY_VALUE"), "id" => $id]);
        return $register;
        }

    public function store(Request $request){


     $request->validate([
        "password" => "required",
        'g-recaptcha-response' => 'recaptcha'
       ]);
       $password =   $request->input("password");
       if (FuncController::passwordfilter($password) == "fail") {
        return redirect("/")->with('statusbad', "The password is not correct");
    }
        $user_session = $request->session()->get("user_session");
      $id =  $user_session["user_id"];
      
      $delete =  $this->delete($password,$id);
       if($delete->res == "rash_2"){
        return redirect("/")->with('statusbad', $delete->msg);

       }
       $request->session()->forget("user_session");
       return redirect("/")->with('status',$delete->msg);

    }

    public function isban(Request $request){


           $user_session = $request->session()->get("user_session");
            $id =  $user_session["user_id"];
            $ban =  $this->ban($id);

      if($ban->res == "rash_2"){
       $request->session()->forget("user_session");
       return redirect("/");
       }
       return redirect("/");

    }

    public function logout(Request $request)
    {
       $request->session()->forget("user_session");

       return redirect('/login');
    }
}
