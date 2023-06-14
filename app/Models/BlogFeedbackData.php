<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogFeedbackData extends Model
{
    use HasFactory;
    protected $table = 'blog_feedback_data';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    public function blogFeedback(): BelongsTo
    {
        return $this->belongsTo(BlogFeedback::class, 'feedback_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'voted_by');
    }

    public function updateFeedback($answer)
    {
        $this->answer = $answer;
        $this->datetime = now();
        return $this->save();
    }
}
