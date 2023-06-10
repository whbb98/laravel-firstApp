<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function updateEmail(Request $request)
    {
        $request->validate([
            'new_email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::find(session("userid"));
        if (Hash::check($request->password, $user->password)) {
            try {
                $status = $user->updateEmail($request->new_email);
            } catch (Exception $e) {
                $status = false;
            }
            if ($status) {
                return redirect()->back()->with('success', 'Email updated successfully.');
            } else {
                return redirect()->back()->with('error', 'Failed to update Email.');
            }
        } else {
            return redirect()->back()->with('error', 'Wrong Password !');
        }
    }




    public function updatePhone(Request $request)
    {
        $request->validate([
            'new_phone' => 'required|numeric',
            'password' => 'required'
        ]);
        $user = User::find(session("userid"));
        if (Hash::check($request->password, $user->password)) {
            try {
                $status = $user->updatePhone($request->new_phone);
            } catch (Exception $e) {
                $status = false;
            }
            if ($status) {
                return redirect()->back()->with('success', 'Phone N° updated successfully.');
            } else {
                return redirect()->back()->with('error', 'Failed to update Phone N°.');
            }
        } else {
            return redirect()->back()->with('error', 'Wrong Password !');
        }
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'new_password_confirm' => 'required'
        ]);
        if ($request->new_password != $request->new_password_confirm) {
            return redirect()->back()->with('error', "Password Confirmation Doesn't match!");
        }
        $user = User::find(session("userid"));
        if (Hash::check($request->current_password, $user->password)) {
            try {
                $status = $user->updatePassword($request->new_password);
            } catch (Exception $e) {
                $status = false;
            }
            if ($status) {
                return redirect()->back()->with('success', 'Phone N° updated successfully.');
            } else {
                return redirect()->back()->with('error', 'Failed to update Phone N°.');
            }
        } else {
            return redirect()->back()->with('error', 'Wrong Password !');
        }
    }
}
