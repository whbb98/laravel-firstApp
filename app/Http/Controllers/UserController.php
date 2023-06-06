<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function test()
    {
        $userId = 4;
        $user = User::find($userId);
        $profile = $user->profile; // Retrieve the associated profile
        // You can access profile attributes like this:
        $profileName = $profile->name;
        $profileEmail = $profile->email;
    }
}
