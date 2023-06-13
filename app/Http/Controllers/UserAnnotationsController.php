<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogImages;
use App\Models\User;
use App\Models\UserAnnotations;
use Exception;
use Illuminate\Http\Request;

class UserAnnotationsController extends Controller
{
    public function fetchAnnotation(Request $request)
    {
        try {
            $validated = $request->validate([
                'user_id' => 'required|numeric|min:1',
                'blog_id' => 'required|numeric|min:1',
                'image_id' => 'required|numeric|min:1'
            ]);
        } catch (Exception $e) {
            $validated = null;
        }

        if (!$validated) {
            return "Request Inputs Error";
        }

        $blogid = $validated['blog_id'];
        $imageid = $validated['image_id'];
        $user = User::find($validated['user_id']);
        $blog = Blog::find($blogid);
        $blogImage = BlogImages::find($imageid);

        // test the user access
        if (!$blogImage || !$blog || !$blog->getBlogAccess() || $blogImage->blog_id != $blog->id) {
            return "Access Denied!";
        }
        $userAnno = UserAnnotations::where('user_id', $user->id)
            ->where('blog_id', $blog->id)
            ->where('image_id', $blogImage->id)
            ->first();
        if ($userAnno) {
            return $userAnno->getAnnotation();
        } else {
            return "[]";
        }
    }

    public function storeAnnotation(Request $request)
    {
        try {
            $validated = $request->validate([
                'blog_id' => 'required|numeric|min:1',
                'image_id' => 'required|numeric|min:1',
                "annotation" => 'required|string'
            ]);
        } catch (Exception $e) {
            $validated = null;
        }

        if (!$validated) {
            return "Request Inputs Error";
        }

        $blogid = $validated['blog_id'];
        $imageid = $validated['image_id'];
        $user = User::find(session('userid'));
        $blog = Blog::find($blogid);
        $blogImage = BlogImages::find($imageid);

        // test the user access
        if (!$blogImage || !$blog || !$blog->getBlogAccess() || $blogImage->blog_id != $blog->id) {
            return "Access Denied!";
        }

        $userAnno = UserAnnotations::where('user_id', $user->id)
            ->where('blog_id', $blog->id)
            ->where('image_id', $blogImage->id)
            ->first();
        if ($userAnno) {
            $userAnno->annotation = $validated['annotation'];
            return $userAnno->save();
        } else {
            $userAnno = new UserAnnotations();
            $userAnno->user_id = $user->id;
            $userAnno->blog_id = $blog->id;
            $userAnno->image_id = $blogImage->id;
            return $userAnno->setAnnotation($validated['annotation']);
        }
    }
}
