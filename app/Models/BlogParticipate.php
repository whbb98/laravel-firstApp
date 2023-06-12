<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogParticipate extends Model
{
    use HasFactory;
    protected $table = 'blog_participate';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    public function blog(): BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function inviteParticipant($email)
    {
        $user = User::where('email', $email)->first();
        if ($user && $user->id != (User::find(session('userid')))->id) {
            $this->user_id = $user->id;
            $this->status = -1;
            return $this->save();
        }
    }

    public function doParticipate()
    {
        if ($this->status == -1) {
            $this->status = 1;
            return $this->save();
        }
        return false;
    }

    public function dontParticipate()
    {
        if ($this->status == -1) {
            $this->status = 0;
            return $this->delete();
        }
        return false;
    }
}
