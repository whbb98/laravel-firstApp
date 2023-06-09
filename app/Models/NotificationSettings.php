<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class NotificationSettings extends Model
{
    use HasFactory;
    protected $table = 'notification_settings';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function updateSettings($flags)
    {
        $this->followers = in_array("1", $flags);
        $this->message_request = in_array("2", $flags);
        $this->blog_invitations = in_array("3", $flags);
        $this->emails = in_array("4", $flags);
        $this->sms = in_array("5", $flags);
        return $this->save();
    }
}
