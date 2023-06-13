<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogComments extends Model
{
    use HasFactory;
    protected $table = 'blog_comments';
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

    public function repliedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'replied_to');
    }

    public function createComment($blogid, $content)
    {
        $this->user_id = session('userid');
        $this->blog_id = $blogid;
        $this->content = $content;
        $this->datetime = now();
        return $this->save();
    }
}
