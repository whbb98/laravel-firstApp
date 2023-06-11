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

    public static function suggestParticipants($query)
    {
        $users = User::where(function ($q) use ($query) {
            $q->where('username', 'LIKE', "%{$query}%")
                ->orWhere('first_name', 'LIKE', "%{$query}%")
                ->orWhere('last_name', 'LIKE', "%{$query}%")
                ->orWhere('email', 'LIKE', "%{$query}%");
        })
            ->with('profile')
            ->get();

        $filteredUsers = [];

        foreach ($users as $user) {
            $filteredUsers[] = [
                'id' => $user->id,
                'username' => $user->username,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'profile' => [
                    'photo' => $user->profile->getPhoto(),
                    'occupation' => $user->profile->occupation,
                    'department' => $user->profile->getDpartmentName(),
                    'hospital' => $user->profile->getHospitalName(),
                    'city' => $user->profile->getCityName()
                ]
            ];
        }

        return json_encode($filteredUsers);
    }


    public function
    createBlog($title, $description, $datetime, $has_meeting, $user_id)
    {
        $this->title = trim($title);
        $this->description = trim($description);
        $this->datetime = $datetime;
        $this->has_meeting = $has_meeting;
        $this->user_id = $user_id;
        return $this->save();
    }
}
