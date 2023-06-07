<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;
    protected $table = 'post';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function postData(): HasMany
    {
        return $this->hasMany(PostData::class);
    }

    public function postComments(): HasMany
    {
        return $this->hasMany(PostComments::class);
    }

    public function postInteractions(): HasMany
    {
        return $this->hasMany(PostInteractions::class);
    }
}
