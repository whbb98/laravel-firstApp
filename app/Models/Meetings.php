<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Meetings extends Model
{
    use HasFactory;
    protected $table = 'meetings';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    public function blog(): BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }

    public function createMeeting($blog_id, $datetime, $url)
    {
        $this->blog_id = $blog_id;
        $this->scheduled = $datetime;
        $this->link = $url;
        return $this->save();
    }

    public function validateDateTime($value)
    {
        return strtotime($value) > time();
    }

    public static function fetchMeetings()
    {
        $user = User::find(session('userid'));
        $participations = $user->blogParticipations;
        $blogIds = $participations->pluck('blog_id')->toArray();
        $meetings = Meetings::whereIn('blog_id', $blogIds)->get();
        $filteredMeetings = [];
        foreach ($meetings as $meeting) {
            $filtered =  [
                'id' => $meeting->id,
                'blog_id' => $meeting->blog_id,
                'link' => $meeting->link,
                'title' => Blog::find($meeting->blog_id)->title,
                'date' => Carbon::createFromFormat('Y-m-d H:i:s', $meeting->scheduled)->format('Y F d H:i'),
                'participants' => BlogParticipate::where('blog_id', $meeting->blog_id)->count(),
                'status' => (strtotime($meeting->scheduled) > time()) ? 'scheduled' : 'happened',
                'cover' => BlogImages::where('blog_id', $meeting->blog_id)->inRandomOrder()->first()->getPhoto()
            ];
            $filteredMeetings[] = $filtered;
        }
        return $filteredMeetings;
    }

    public static function fetchUserMeetings()
    {
        $user = User::find(session('userid'));
        $blogs = $user->blogs;
        $blogIds = $blogs->pluck('id')->toArray();
        $meetings = Meetings::whereIn('blog_id', $blogIds)->get();
        $filteredMeetings = [];
        foreach ($meetings as $meeting) {
            $filtered =  [
                'id' => $meeting->id,
                'blog_id' => $meeting->blog_id,
                'link' => $meeting->link,
                'title' => Blog::find($meeting->blog_id)->title,
                'date' => Carbon::createFromFormat('Y-m-d H:i:s', $meeting->scheduled)->format('Y F d H:i'),
                'participants' => BlogParticipate::where('blog_id', $meeting->blog_id)->count(),
                'status' => (strtotime($meeting->scheduled) > time()) ? 'scheduled' : 'happening',
                'cover' => BlogImages::where('blog_id', $meeting->blog_id)->inRandomOrder()->first()->getPhoto()
            ];
            $filteredMeetings[] = $filtered;
        }
        return $filteredMeetings;
    }
}
