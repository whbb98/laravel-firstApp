<?php

use App\Http\Controllers\BlogCommentsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\testing;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NotificationSettingsController;
use App\Http\Controllers\UserAnnotationsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserNetworkController;
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

// >>>>>>>>>>>>>>>>>>>>>>>>>>>>> User Profile Forms
Route::post(
    "/profile/updateProfilePhoto",
    [ProfileController::class, "updateProfilePhoto"]
)->middleware("CheckLogin");

Route::post(
    "/profile/updateProfileCover",
    [ProfileController::class, "updateProfileCover"]
)->middleware("CheckLogin");

Route::get(
    "/profile/deleteProfilePhoto",
    [ProfileController::class, "deleteProfilePhoto"]
)->middleware("CheckLogin");

Route::get(
    "/profile/deleteProfileCover",
    [ProfileController::class, "deleteProfileCover"]
)->middleware("CheckLogin");

Route::post(
    "/profile/updateProfileBio",
    [ProfileController::class, "updateProfileBio"]
)->middleware("CheckLogin");

Route::post(
    "/profile/updateProfileCareer",
    [ProfileController::class, "updateProfileCareer"]
)->middleware("CheckLogin");

Route::post(
    "/profile/addProfileCareerRow",
    [CareerController::class, "addProfileCareerRow"]
)->middleware("CheckLogin");

Route::get(
    "/profile/dropProfileCareerRow/{id}",
    [CareerController::class, "dropProfileCareerRow"]
)->middleware("CheckLogin");

Route::post(
    "/profile/updateProfileNotificationSettings",
    [NotificationSettingsController::class, "updateProfileNotificationSettings"]
)->middleware("CheckLogin");

Route::post(
    "/profile/updateContact",
    [ContactController::class, "updateContact"]
)->middleware("CheckLogin")->name("contactme-form");

Route::post(
    "/profile/updateEmail",
    [UserController::class, "updateEmail"]
)->middleware("CheckLogin")->name("updateEmail-form");

Route::post(
    "/profile/updatePhone",
    [UserController::class, "updatePhone"]
)->middleware("CheckLogin")->name("updatePhone-form");

Route::post(
    "/profile/updatePassword",
    [UserController::class, "updatePassword"]
)->middleware("CheckLogin")->name("updatePassword-form");
// <<<<<<<<<<<<<<<<<<<<<<<<<<<<< User Profile Forms

// >>>>>>>>>>>>>>>>>>>>>>>>>> User Network Routes
Route::get(
    "/network/getAllUsers",
    [UserNetworkController::class, "getAllUsers"]
)->middleware("CheckLogin")->name("user-search-form");
// <<<<<<<<<<<<<<<<<<<<<<<<<< User Network Routes

// >>>>>>>>>>>>>>>>>>>>>>>>>>> Blog Routes
Route::get("/blogs", [BlogController::class, "fetchBlogs"])->middleware("CheckLogin")->name("blogs");

Route::get("/blog/{id}", [BlogController::class, "accessBlog"])->middleware("CheckLogin");

Route::post(
    "/blogs/createBlog",
    [BlogController::class, "createBlog"]
)->middleware("CheckLogin")->name("createBlog-form");

Route::get(
    "/blogs/suggestParticipants",
    [BlogController::class, "suggestParticipants"]
)->middleware("CheckLogin");

// Annotations route
Route::get(
    "/fetchAnnotation",
    [UserAnnotationsController::class, "fetchAnnotation"]
)->middleware("CheckLogin");

Route::post(
    "/storeAnnotation",
    [UserAnnotationsController::class, "storeAnnotation"]
)->middleware("CheckLogin");
// Blog Comments Route
Route::get(
    "/fetchAllComments",
    [BlogCommentsController::class, "fetchAllComments"]
)->middleware("CheckLogin");

Route::post(
    "/insertBlogComment",
    [BlogCommentsController::class, "insertComment"]
)->middleware("CheckLogin");
// <<<<<<<<<<<<<<<<<<<<<<<<<<< Blog Routes














Route::get("/test", [testing::class, "test"])->middleware("CheckLogin");



//>>>>>>>>>>>>>>>>>>>>>>>> admin routes >>>>>>>>>>>>>>>>>>>>>>>>>

Route::get("/admin", function () {
    return view("admin.admin-login");
});

// <<<<<<<<<<<<<<<<<<<<<<<< admin routes <<<<<<<<<<<<<<<<<<<<<<<<<