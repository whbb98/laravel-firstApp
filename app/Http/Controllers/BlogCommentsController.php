<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogComments;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class BlogCommentsController extends Controller
{
    public function insertComment(Request $request)
    {
        try {
            $validated = $request->validate([
                'blog_id' => 'required|numeric|min:1',
                // 'replied_to' => 'required|numeric|min:1',
                "content" => 'required|string'
            ]);
        } catch (Exception $e) {
            $validated = null;
        }
        if (!$validated) {
            return "Request Inputs Error";
        }
        // $user = User::find($validated['replied_to']);
        $blog = Blog::find($validated['blog_id']);
        // test the user access
        if (!$blog || !$blog->getBlogAccess()) {
            return "Access Denied!";
        }
        $blogComment = new BlogComments();
        $commentText = trim(strip_tags($validated['content']));
        return $blogComment->createComment($blog->id, $commentText);
    }

    // --------------------------------------------------------------------

    public function fetchAllComments(Request $request)
    {
        try {
            $validated = $request->validate([
                'blog_id' => 'required|numeric|min:1'
            ]);
        } catch (Exception $e) {
            $validated = null;
        }
        if (!$validated) {
            return "Request Inputs Error";
        }
        $blog = Blog::find($validated['blog_id']);
        // test the user access
        if (!$blog || !$blog->getBlogAccess()) {
            return "Access Denied!";
        }

        $blogComments = [];
        foreach ($blog->blogComments as $comment) {
            $user = User::find($comment->user_id);
            $blogComments[] = [
                "userid" => $user->id,
                "username" => $user->first_name . " " . $user->last_name,
                "photo" => $user->profile->getPhoto(),
                "datetime" => $comment->datetime,
                "comment" => $comment->content,
                // "replied_to" => $comment->replied_to
            ];
        }
        return json_encode($blogComments);
    }
}
