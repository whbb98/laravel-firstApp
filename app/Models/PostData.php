<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostData extends Model
{
    use HasFactory;
    protected $table = 'post_data';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    public function Post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
