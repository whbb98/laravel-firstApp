<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function login()
    {
        return view("login");
    }
    public function signup()
    {
        return view("signup");
    }

    public function signupUser(Request $req)
    {
        $req->validate(
            [
                "first_name" => "required",
                "last_name" => "required",
                "birth_date" => "required|date",
                "username" => "required|unique:user",
                "email" => "required|email|unique:user",
                "password" => "required|min:10",
                'gender' => 'required|in:M,F',
                "phone" => "required|unique:user|numeric|min:10"
            ],
            [
                "username.unique" => "The Username you entered is already taken.",
                "email.unique" => "The Email you entered is already registered.",
                "phone.unique" => "The Phone N° you entered is already registered."
            ]
        );

        $user = new User();
        $user->username = $req->username;
        $user->first_name = $req->first_name;
        $user->last_name = $req->last_name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->birth_date = $req->birth_date;
        $user->joined = Carbon::now();
        $user->gender = $req->gender;

        $status = $user->save();
        if ($status) {
            return back()->with("success", "Account Created Successfully");
        } else {
            return back()->with("fail", "Something Went Wrong");
        }
    }

    public function loginUser(Request $req)
    {
        $req->validate(
            [
                "email" => "required|email",
                "password" => "required"
            ],
            [
                "email.exists" => "The email you entered does not exist.",
                "password" => "The password you entered is incorrect.",
            ]
        );
        $user = User::where("email", "=", $req->email)->first();
        if ($user) {
            if (Hash::check($req->password, $user->password)) {
                $req->session()->put("userid",  $user->id);
                //+++++++++++++++++++++++++++++++++++++++++ 
                session()->put("username", $user->username);
                session()->put("first", $user->first_name);
                session()->put("last", $user->last_name);
                session()->put("email", $user->email);
                session()->put("phone", $user->phone);
                // $birthYear = Carbon::createFromFormat('Y-m-d', $user->birth_date)->year;
                session()->put("birthYear", $user->birth_date);
                $dateTime = Carbon::createFromFormat('Y-m-d H:i:s', $user->joined);
                session()->put("joined", $dateTime->format('Y F'));
                // +++++++++++++++++++++++++++++++++++++++
                return redirect('/home');
            } else {
                return back()->withInput()->with("fail", "Wrong Password");
            }
        } else {
            return back()->with("fail", "User Not Registered");
        }
    }

    public function logout()
    {
        if (session()->has("userid")) {
            session()->pull("userid");
            return redirect("/login");
        }
    }
}
