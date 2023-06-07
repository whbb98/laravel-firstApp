<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class UserNetwork extends Model
{
    use HasFactory;
    protected $table = 'user_network';
    protected $primaryKey = ['sender', 'receiver'];
    public $incrementing = true;
    public $timestamps = false;

    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sender');
    }

    public function receiver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'receiver');
    }
}
