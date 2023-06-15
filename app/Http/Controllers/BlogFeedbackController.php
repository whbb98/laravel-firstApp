<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogFeedbackData;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class BlogFeedbackController extends Controller
{

    public function fetchUserVote(Request $request)
    {
        try {
            $validated = $request->validate([
                'blog_id' => 'required|numeric|min:1',
            ]);
            $blog = Blog::find($validated['blog_id']);
            $user = User::find(session('userid'));
        } catch (Exception $e) {
            $validated = null;
        }

        if (!$validated || !$blog || !$blog->getBlogAccess()) {
            return "Request Inputs Error";
        }

        $blogFeedback = $blog->blogFeedback;

        if ($blogFeedback) {
            $userAnswer = BlogFeedbackData::where('voted_by', $user->id)
                ->where('feedback_id', $blogFeedback->id)
                ->value('answer');

            if ($userAnswer) {
                return $userAnswer;
            } else {
                $userAnswer = -1;
            }
        } else {
            // Blog feedback not found
            $userAnswer = -1;
        }

        return $userAnswer;
    }

    public function insertUserVote(Request $request)
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

        $blogFeedback = $blog->blogFeedback;
        if ($blogFeedback) {
            $userFeedback = BlogFeedbackData::where('feedback_id', $blogFeedback->id)
                ->where('voted_by', $user->id)
                ->first();

            if (!$userFeedback) {
                $userFeedback = new BlogFeedbackData();
                $userFeedback->feedback_id = $blog->blogFeedback->id;
                $userFeedback->voted_by = $user->id;
                return $userFeedback->updateFeedback($validated['answer']);
            }
            return $userFeedback->updateFeedback($validated['answer']);
        }
    }


    public function fetchFeedbackData(Request $request)
    {
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

        return $blog->blogFeedback->getAllFeedbackData();
    }

    public function fetchFeedbackLabels(Request $request)
    {
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

        return json_decode($blog->blogFeedback->labels);
    }
}
