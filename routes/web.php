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
})->name("home")->middleware("AlreadyLoggedIn");

Route::get("/login", [UserAuthController::class, "login"])->middleware("AlreadyLoggedIn");

Route::post("/login-user", [UserAuthController::class, "loginUser"])
    ->name("login-user");

Route::get("/signup", [UserAuthController::class, "signup"])->middleware("AlreadyLoggedIn");

Route::post("/signup-user", [UserAuthController::class, "signupUser"])
    ->name("signup-user");

Route::get("/logout", [UserAuthController::class, "logout"]);

//<<<<<<<<<<<<<<<<<<<<<< public routes <<<<<<<<<<<<<<<<<<<

//>>>>>>>>>>>>>>>>>>>>>>> user routes >>>>>>>>>>>>>>>>>>>>
Route::get("/home", function () {
    return view("user.home");
})->middleware("CheckLogin");

Route::get("/profile", function () {
    return view("user.profile");
})->middleware("CheckLogin");

Route::get("/messages", function () {
    return view("user.messages");
})->middleware("CheckLogin");

Route::get("/notifications", function () {
    return view("user.notifications");
})->middleware("CheckLogin");

Route::get("/blogs", function () {
    return view("user.blogs");
})->middleware("CheckLogin");

Route::get("/blog", function ($id = 0) {
    return view("user.blog", [
        'id' => $id
    ]);
})->middleware("CheckLogin");

Route::get("/meetings", function () {
    return view("user.meetings");
})->middleware("CheckLogin");

Route::get("/meeting", function () {
    return view("user.meeting");
})->middleware("CheckLogin");

Route::get("/network", function () {
    return view("user.network");
})->middleware("CheckLogin");
//<<<<<<<<<<<<<<<<<<<<<<<<<< user routes<<<<<<<<<<<<<<<<<<<<<<<<<<

Route::get("/test", function () {
    return view("user.test");
})->middleware("CheckLogin");



//>>>>>>>>>>>>>>>>>>>>>>>> admin routes >>>>>>>>>>>>>>>>>>>>>>>>>

Route::get("/admin", function () {
    return view("admin.admin-login");
});

// <<<<<<<<<<<<<<<<<<<<<<<< admin routes <<<<<<<<<<<<<<<<<<<<<<<<<