<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blog';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function meeting(): HasOne
    {
        return $this->hasOne(Meetings::class);
    }

    public function blogImages(): HasMany
    {
        return $this->hasMany(BlogImages::class);
    }

    public function blogParticipants(): HasMany
    {
        return $this->hasMany(BlogParticipate::class);
    }

    public function annotations(): HasMany
    {
        return $this->hasMany(UserAnnotations::class);
    }

    public function MLPredictions(): HasMany
    {
        return $this->hasMany(MLPredictions::class);
    }

    public function MLAnnotations(): HasMany
    {
        return $this->hasMany(MLAnnotations::class);
    }

    public function blogComments(): HasMany
    {
        return $this->hasMany(BlogComments::class);
    }

    public function blogFeedback(): HasOne
    {
        return $this->hasOne(BlogFeedback::class);
    }
}
