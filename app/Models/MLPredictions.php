<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MLPredictions extends Model
{
    use HasFactory;
    protected $table = 'ml_predictions';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;


    public function blog(): BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }

    public function blogImage(): BelongsTo
    {
        return $this->belongsTo(BlogImages::class, 'image_id');
    }
}
