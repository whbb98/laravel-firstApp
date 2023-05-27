<?php

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

//++++++++++++++++++< public routes >++++++++++++++++++
Route::get('/', function () {
    return view('home');
})->name("home");

Route::get("/login", function () {
    return view("login");
});

Route::get("/signup", function () {
    return view("signup");
});
//++++++++++++++++++</ public routes >++++++++++++++++++

//++++++++++++++++++< user routes >++++++++++++++++++
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

Route::get("/blog", function () {
    return view("user.blog");
});

Route::get("/meetings", function () {
    return view("user.meetings");
});

Route::get("/meeting", function () {
    return view("user.meeting");
});

//++++++++++++++++++< user routes >++++++++++++++++++













Route::get("/admin", function () {
    return view("admin.admin-login");
});
