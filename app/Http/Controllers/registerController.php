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
    public function usercheck($username, $email,$password)
    {

        $register = FuncController::sentget("/users/check", [env("API_ADMIN_BODY_APIKEY_KEY") => env("API_ADMIN_BODY_APIKEY_VALUE"), "username" => $username, "email" => $email, "password" => $password]);
        return $register;
    }


    public function store(Request $request)
    {

      $form =  $request->validate([
            "regusername" => "required",
            "regemail" => "required",
            "regpassword" => "required",
            "regrepassword" => "required",
            'g-recaptcha-response' => 'recaptcha'
        ]);



        if ( $form["regpassword"] != $form["regrepassword"]) {
            return redirect("/login")->with('statusbad', "The password is not the matching");
        }
        if (FuncController::passwordfilter($form["regpassword"]) == "fail") {
           
            return redirect("/login")->with('statusbad', "The password is not strong");
        }
        if (FuncController::username($form["regusername"]) == "fail") {

  
            return redirect("/login")->with('statusbad', "This is invalid username");
        }    
       
        if (strlen($form["regusername"]) > 30) {
            
  
            return redirect("/login")->with('statusbad', "Please Write fewer letters");
        }
        if (strlen($form["regusername"]) < 4) {
            
       
            return redirect("/login")->with('statusbad', "Please Write more leter");
        }
        if (strlen($form["regpassword"]) > 30) {
            
      
            return redirect("/login")->with('statusbad', "The password is to long it's must be under 30");
        }
        if (strlen("regpassword") < 8) {
          
            return redirect("/login")->with('statusbad', "the password small it mast be biggar an 4");
        }
 
        if (FuncController::emailfilter($form["regemail"]) == "good") {
            
            $usercheck =  $this->usercheck(FuncController::xssfilter($form["regusername"]), FuncController::xssfilter($form["regemail"]), $form["regpassword"]);
 
            if ($usercheck->res == "rash_1") {

                $request->session()->put("verfiy", [
                    "code_link" => FuncController::generateToken(125),
                    "code" =>  FuncController::generatenumber(6)
                ]);

                $verfiy = $request->session()->get('verfiy');
                $ver = $verfiy["code_link"];
                $code = $verfiy["code"];

   
                $data = [
                    "subject" => env("APP_NAME"),
                    "code_link" => "http://127.0.0.1:8000/user/verifiy/".$ver,
                    "body" => $code
                ];


               try {
                    Mail::to($form["regemail"])->send(new verfiy($data));
                    $SS = User::updateOrCreate(
                        [
                            'email' => $form["regemail"],
                        ],
                        [
                            'name' => $form["regusername"],
                            "password" =>  $form["regpassword"],
                            "code_link" => $ver,
                            "code" => $code
                        ]
                    );
                    return redirect("/login")->with('status', "check you mailbox");
    
            } catch (\Throwable $th) {
                 return response()->json(["sorry there was a problem and we cannat complit the prossece"]);
                }
                
            }
        }
  
        return redirect("/login")->with('statusbad', "There are problem with register ");
    }
}
