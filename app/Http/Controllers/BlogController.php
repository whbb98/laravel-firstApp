<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogImages;
use App\Models\BlogParticipate;
use App\Models\Meetings;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

use function PHPSTORM_META\map;

class BlogController extends Controller
{

    public function accessBlog(Request $request)
    {
        $id = $request->id;
        $user = User::find(session('userid'));
        if (!(is_numeric($id) && $id > 0)) {
            return redirect()->route("blogs");
        }
        $blog = Blog::find($id);
        if (!$blog) {
            return redirect()->route("blogs");
        }
        $datetime = Carbon::createFromFormat('Y-m-d H:i:s', $blog->datetime);
        $blog->datetime = $datetime->format('Y F d H:i');
        $participants = $blog->blogParticipants;
        $participantsID = [];
        $participantsID[] = $blog->user_id;
        foreach ($participants as $p) {
            $participantsID[] = $p->user_id;
        }
        if (!$blog->getBlogAccess()) {
            return redirect()->route("blogs");
        }
        $participantsList = User::whereIn('id', $participantsID)->get();
        $users = [];
        foreach ($participantsList as $participant) {
            if ($participant->id != session('userid')) {
                $users[] = $participant;
            }
        }
        return view("user.blog", [
            "id" => $id,
            "user" => $user,
            "blog" => $blog,
            "users" => $users,
            "images" => $blog->blogImages
        ]);
    }

    public function fetchBlogs(Request $request)
    {
        $userBlogs = Blog::fetchUserBlogs();
        $participateBlogs = Blog::fetchParticipateBlogs();
        return view("user.blogs", [
            "userBlogs" => $userBlogs,
            "participateBlogs" => $participateBlogs
        ]);
    }

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

            if ($validated) {
                // creating new blog
                $blog = new Blog();
                $has_meeting = isset($validated['has_meeting']);
                $blog->createBlog($validated['blog_title'], $validated['blog_description'], now(), $has_meeting, session('userid'));
                // if has meeting we insert meeting data
                if ($has_meeting) {
                    $meeting = new Meetings();
                    if ($meeting->validateDateTime($validated['meeting_datetime'])) {
                        $meeting->createMeeting($blog->id, $validated['meeting_datetime'], $validated['meeting_url']);
                    } else {
                        $blog->delete();
                        return redirect()->back()->with('error', 'Meeting date must be in Future')->withInput();
                    }
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
            } else {
                $status = false;
                return redirect()->back()->with('error', 'Please verify your input fields!')->withInput();
            }
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
