<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogFeedback;
use App\Models\BlogImages;
use App\Models\BlogParticipate;
use App\Models\Meetings;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;


class testing extends Controller
{
    public function test(Request $request)
    {
        $blog = Blog::find(1);
        $feedback = $blog->blogFeedback->labels;
        // echo "<pre>";
        $test =  json_decode($feedback);
        echo var_dump($test);
        // foreach ($feedback as $image) {

        // }
    }
}
