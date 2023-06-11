<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    use HasFactory;
    protected $table = 'user';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;


    // start of relatioships>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    public function career(): HasMany
    {
        return $this->hasMany(Career::class);
    }

    public function contact(): HasOne
    {
        return $this->hasOne(Contact::class);
    }

    public function sentRequests()
    {
        return $this->belongsToMany(User::class, 'user_networks', 'sender', 'receiver')
            ->withPivot('status')
            ->wherePivot('status', 1);
    }

    public function receivedRequests()
    {
        return $this->belongsToMany(User::class, 'user_networks', 'receiver', 'sender')
            ->withPivot('status')
            ->wherePivot('status', 1);
    }

    public function friends()
    {
        return $this->sentRequests()->orWhere(function ($query) {
            $query->where('receiver', $this->id)
                ->where('status', 1);
        });
        // $user = User::find(98);
        // $friends = $user->friends;
    }

    public function notificationSettings(): HasOne
    {
        return $this->hasOne(NotificationSettings::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function postComments(): HasMany
    {
        return $this->hasMany(PostComments::class);
    }

    public function postInteraction(): HasOne
    {
        return $this->hasOne(PostInteractions::class);
    }

    public function sentNotifications(): HasMany
    {
        return $this->hasMany(Notifications::class, "sender");
    }

    public function receivedNotifications(): HasMany
    {
        return $this->hasMany(Notifications::class, "receiver");
    }

    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class);
    }

    public function blogParticipations(): HasMany
    {
        return $this->hasMany(BlogParticipate::class);
    }

    public function annotations(): HasMany
    {
        return $this->hasMany(UserAnnotations::class);
    }

    public function blogComments(): HasMany
    {
        return $this->hasMany(BlogComments::class);
    }

    public function blogFeedbacks(): HasMany
    {
        return $this->hasMany(BlogFeedbackData::class, 'voted_by');
    }

    // end of relatioships<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

    public function updateEmail($new_email)
    {
        $this->email = $new_email;
        return $this->save();
    }
    public function updatePhone($new_phone)
    {
        $this->phone = $new_phone;
        return $this->save();
    }
    public function updatePassword($new_password)
    {
        $this->password = Hash::make($new_password);
        return $this->save();
    }
}
