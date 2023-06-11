<?php

namespace App\Models;

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
}
