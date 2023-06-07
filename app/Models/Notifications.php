<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notifications extends Model
{
    use HasFactory;
    protected $table = 'notifications';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class, "sender");
    }

    public function receiver(): BelongsTo
    {
        return $this->belongsTo(User::class, "receiver");
    }
}
