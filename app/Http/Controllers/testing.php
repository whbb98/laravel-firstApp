<?php

namespace App\Http\Controllers;

use App\Models\Blog;
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
        $blog = Blog::find(18);
        // $blogImages = BlogImages::where('blog_id', 16)->inRandomOrder()->first()->getPhoto();
        $blogImages = $blog->blogImages;
        // echo "<pre>";
        foreach ($blogImages as $image) {
            echo $image->image_name . '<hr>';
            // echo $image->id ." <img width='100' height='150' src='".$image->getPhoto()."'>" . "<br>";
        }
    }
}
