<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profile';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function updatePhoto($file)
    {
        $this->photo = file_get_contents($file->getPathname());
        return $this->save();
    }

    public function updateCover($file)
    {
        $this->cover = file_get_contents($file->getPathname());
        return $this->save();
    }

    public function updateBio($bio) // updateProfilePersonalInfo
    {
        $this->bio = $bio;
        return $this->save();
    }

    public function updateCareer(Request $req)
    {
        $this->occupation = strip_tags($req->occupation);
        $this->department = strip_tags($req->department);
        $this->hospital = strip_tags($req->hospital);
        $this->city = strip_tags($req->city);
        return $this->save();
    }
    
}
