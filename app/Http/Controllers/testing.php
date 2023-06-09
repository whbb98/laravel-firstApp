<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

use function Composer\Autoload\includeFile;

class testing extends Controller
{
    public function test(Request $request)
    {
        require app_path('Helpers/constants.php');

        // foreach ($algerianCities as $key => $value) {
        //     echo $key . " ----> " . $value . '<br>';
        // }

    }
}
