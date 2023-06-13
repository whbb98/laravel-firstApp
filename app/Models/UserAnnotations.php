<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAnnotations extends Model
{
    use HasFactory;
    protected $table = 'user_annotations';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function blog(): BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }

    public function blogImage(): BelongsTo
    {
        return $this->belongsTo(BlogImages::class);
    }

    public function getAnnotation()
    {
        return $this->annotation;
    }

    public function setAnnotation($anno)
    {
        $this->annotation = $anno;
        return $this->save();
    }
}
