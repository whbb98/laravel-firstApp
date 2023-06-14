<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogFeedbackData;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class BlogFeedbackController extends Controller
{
    public function vote(Request $request)
    {
        try {
            $validated = $request->validate([
                'blog_id' => 'required|numeric|min:1',
                'answer' => 'required|numeric|min:0|max:14'
            ]);
            $blog = Blog::find($validated['blog_id']);
            $user = User::find(session('userid'));
        } catch (Exception $e) {
            $validated = null;
        }

        if (!$validated || !$blog || !$blog->getBlogAccess()) {
            return "Request Inputs Error";
        }

        $userFeedback = BlogFeedbackData::where('blog_id', $blog->id)
            ->where('voted_by', $user->id)->get();

        if (!$userFeedback) {
            $userFeedback = new BlogFeedbackData();
            $userFeedback->feedback_id = $blog->blogFeedback->id;
            $userFeedback->voted_by = $user->id;
            return $userFeedback->updateFeedback($validated['answer']);
        }
        return $userFeedback->updateFeedback($validated['answer']);
    }


    public function fetchVoteData(Request $request){
        try {
            $validated = $request->validate([
                'blog_id' => 'required|numeric|min:1'
            ]);
            $blog = Blog::find($validated['blog_id']);
            $user = User::find(session('userid'));
        } catch (Exception $e) {
            $validated = null;
        }

        if (!$validated || !$blog || !$blog->getBlogAccess()) {
            return "Request Inputs Error";
        }
    }

}
