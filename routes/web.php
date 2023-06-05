<?php

use App\Http\Controllers\UserAuthController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//>>>>>>>>>>>>>>>>>>>>>> public routes >>>>>>>>>>>>>>>>>>
Route::get('/', function () {
    return view('home');
})->name("home");

Route::get("/login", [UserAuthController::class, "login"]);

Route::post("/login-user", [UserAuthController::class, "loginUser"])
    ->name("login-user");

Route::get("/signup", [UserAuthController::class, "signup"]);

Route::post("/signup-user", [UserAuthController::class, "signupUser"])
    ->name("signup-user");

Route::get("/logout", [UserAuthController::class, "logout"]);

//<<<<<<<<<<<<<<<<<<<<<< public routes <<<<<<<<<<<<<<<<<<<

//>>>>>>>>>>>>>>>>>>>>>>> user routes >>>>>>>>>>>>>>>>>>>>
Route::get("/home", function () {
    return view("user.home");
});

Route::get("/profile", function () {
    return view("user.profile");
});

Route::get("/messages", function () {
    return view("user.messages");
});

Route::get("/notifications", function () {
    return view("user.notifications");
});

Route::get("/blogs", function () {
    return view("user.blogs");
});

Route::get("/blog", function ($id = 0) {
    return view("user.blog", [
        'id' => $id
    ]);
});

Route::get("/meetings", function () {
    return view("user.meetings");
});

Route::get("/meeting", function () {
    return view("user.meeting");
});

Route::post("/test", function (Request $req) {
    return view("user.test", [
        "data" => $req,
        "myname" => "abdelouahab radja"
    ]);
});

//<<<<<<<<<<<<<<<<<<<<<<<<<< user routes<<<<<<<<<<<<<<<<<<<<<<<<<<

















//>>>>>>>>>>>>>>>>>>>>>>>> admin routes >>>>>>>>>>>>>>>>>>>>>>>>>

Route::get("/admin", function () {
    return view("admin.admin-login");
});

// <<<<<<<<<<<<<<<<<<<<<<<< admin routes <<<<<<<<<<<<<<<<<<<<<<<<<