<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogParticipate;
use App\Models\Meetings;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;


class testing extends Controller
{
    public function test(Request $request)
    {
        $myMeeting  = Meetings::fetchUserMeetings();
        echo '<pre>';
        foreach ($myMeeting as $meeting) {
            print_r($meeting);
        }
        
    }
}
