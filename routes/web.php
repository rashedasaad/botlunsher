<?php

use App\Http\Controllers\AllProcductController;
use App\Http\Controllers\DeleteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OwnedController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\passwordBackController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\VerifictionController;

use Nette\Utils\Html;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name("home");




Route::middleware(["login"])->group(function () {
    Route::get("/login", [LoginController::class, 'index'])->name("loginpage");
    Route::post("/store/login", [LoginController::class, 'store'])->name("login");
    Route::post("/store/register", [registerController::class, 'store'])->name("register");
    Route::get("/forgetpassword", [LoginController::class, 'forgetpasswordpage']);
    Route::post("/store/forgetpassword", [LoginController::class, 'storeforgetpassword'])->name("forgetpasswordstore");
    Route::get("/user/auth/take/{path}", [passwordBackController::class, 'index']);
    Route::get("/user/auth/back/{path}", [passwordBackController::class, 'back'])->name("back");
    Route::post("/store/passback/{path}", [passwordBackController::class, 'store'])->name("passback");
    Route::get("/user/verifiy/{code_link}", [VerifictionController::class, 'index']);
    Route::post("/store/verifiy/{codelink}", [VerifictionController::class, 'store'])->name("verifiy");
});

Route::middleware(["is_login"])->group(function () {
    Route::get('/update', [UpdateController::class, 'index']);
    Route::post("/store/update", [UpdateController::class, 'store'])->name("update");
    Route::get("/payment/{name}/{plan}", [SubscriptionController::class, 'index']);
    Route::post("/store/product", [SubscriptionController::class,  'getProduct'])->name("getProduct");
    Route::post('/user/subscribe', [SubscriptionController::class,  'store'])->name("subscribe");
    Route::get("/product", [AllProcductController::class, "showpproduct"])->name("plan");
    Route::get("/show/{product}", [AllProcductController::class, 'show']);
    Route::get("/delete", [DeleteController::class, 'index']);
    Route::post("/store/delete", [DeleteController::class, 'store'])->name("delete");
    Route::get("/download", [DeleteController::class, 'indexdownload']);
    Route::post("/store/check", [DeleteController::class, 'isban'])->name("isban");
    Route::get("/owned", [OwnedController::class, 'index']);
    Route::get("/cancel/{plan_id}", [OwnedController::class, 'cancle']);
    Route::post("/cancel/sub/{plan_id}", [OwnedController::class, 'store'])->name("cancel");
});
