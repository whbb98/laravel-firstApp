<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contact';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    protected $attributes = [
        'phone' => '0123456789',
        'email' => 'your working email',
        'from_day' => '1',
        'to_day' => '5',
        'from_time' => '00:00',
        'to_time' => '00:00'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function updateContact(Request $req)
    {
        $this->phone = $req->contact_phone;
        $this->email = $req->contact_email;
        $this->from_day = $req->from_day;
        $this->to_day = $req->to_day;
        $this->from_time = $req->from_time;
        $this->to_time = $req->to_time;
        return $this->save();
    }
}
