<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogImages;
use App\Models\BlogParticipate;
use App\Models\Meetings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function GuzzleHttp\Promise\all;

class BlogController extends Controller
{
    public function createBlog(Request $request)
    {
        try {
            $validated = $request->validate([
                'blog_title' => 'required|string|max:255',
                'blog_description' => 'required|string',
                'has_meeting' => 'nullable|in:on',
                'meeting_datetime' => [
                    'nullable',
                    'required_if:has_meeting,on',
                    'date_format:Y-m-d\TH:i',
                ],
                'meeting_url' => [
                    'nullable',
                    'required_if:has_meeting,on',
                    'url',
                ],
                'files' => 'required|array|min:1',
                'files.*' => 'required|image|max:5048',
                'participants' => 'required|string',
            ]);
            // creating new blog
            $blog = new Blog();
            $has_meeting = isset($validated['has_meeting']);
            $status = $blog->createBlog($validated['blog_title'], $validated['blog_description'], now(), $has_meeting, session('userid'));
            // if has meeting we insert meeting data
            if ($has_meeting) {
                $meeting = new Meetings();
                $status = $meeting->createMeeting($blog->id, $validated['meeting_datetime'], $validated['meeting_url']);
            }
            // inserting image files 
            foreach ($request->file('files') as $file) {
                $blogImages = new BlogImages();
                $blogImages->blog_id = $blog->id;
                $blogImages->insertBlogImage($file);
            }
            // inviting participants
            $participants = json_decode($validated['participants']);
            foreach ($participants as $email) {
                $blogParticipate = new BlogParticipate();
                $blogParticipate->blog_id = $blog->id;
                $blogParticipate->inviteParticipant($email);
            }
            $status = true;
        } catch (\Illuminate\Validation\ValidationException $e) {
            $status = false;
        }
        if ($status) {
            return redirect()->back()->with('success', 'Blog created successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to create Blog.')->withInput();
        }
    }

    public function suggestParticipants(Request $request)
    {
        $validatedData = $request->validate([
            'search' => 'nullable|string'
        ]);
        return Blog::suggestParticipants($request->search);
    }
}
