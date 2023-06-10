<?php

namespace App\Http\Controllers;

use App\Models\UserNetwork;
use Illuminate\Http\Request;

class UserNetworkController extends Controller
{

    public function getAllHospitals()
    {
        $userNetwork =  new UserNetwork();
        return $userNetwork->getAllHospitals();
    }
}
