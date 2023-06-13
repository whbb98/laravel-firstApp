<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BlogFeedback extends Model
{
    use HasFactory;
    protected $table = 'blog_feedback';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
    private $xray_classes = "{
        0: 'Atelectasis',
        1: 'Cardiomegaly',
        2: 'Effusion',
        3: 'Infiltration',
        4: 'Mass',
        5: 'Nodule',
        6: 'Pneumonia',
        7: 'Pneumothorax',
        8: 'Consolidation',
        9: 'Edema',
        10: 'Emphysema',
        11: 'Fibrosis',
        12: 'Pleural_Thickening',
        13: 'Hernia',
        14: 'other'
    }";

    public function blog(): BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }

    public function feedbackData(): HasMany
    {
        return $this->hasMany(BlogFeedbackData::class, 'feedback_id');
    }

    public function createFeedback($blogid)
    {
        $this->blog_id = $blogid;
        $this->labels = $this->xray_classes;
        return $this->save();
    }
}
