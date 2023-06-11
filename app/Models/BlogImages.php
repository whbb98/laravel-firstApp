<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BlogImages extends Model
{
    use HasFactory;
    protected $table = 'blog_images';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    public function blog(): BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }

    public function annotations(): HasMany
    {
        return $this->hasMany(UserAnnotations::class, 'image_id');
    }

    public function MLPrediction(): HasOne
    {
        return $this->hasOne(MLPredictions::class, 'image_id');
    }

    public function MLAnnotation(): HasOne
    {
        return $this->hasOne(MLAnnotations::class, 'image_id');
    }

    public function insertBlogImage($file)
    {
        $this->image_name = $file->getClientOriginalName();
        $this->type = $file->getClientMimeType();
        $this->hash_key = hash('sha256', $file->path());
        $this->image_binary = file_get_contents($file->path());
        $status = $this->save();
        return $status;
    }
}
