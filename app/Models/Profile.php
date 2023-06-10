<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

require_once app_path('Helpers/constants.php');

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profile';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    protected $attributes = [
        'bio' => 'Welcome to my profile',
        'city' => '31',
        'hospital' => '0',
        'other_hospital' => 'hospital unknown',
        'occupation' => 'occupation',
        'department' => '0'
    ];

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

        $this->bio = trim($bio);
        return $this->save();
    }

    public function updateCareer(Request $req)
    {
        $this->occupation = strip_tags($req->occupation);
        $this->department = strip_tags($req->department);
        $this->hospital = strip_tags($req->hospital);
        $this->other_hospital = strip_tags($req->other_hospital);
        $this->city = strip_tags($req->city);
        return $this->save();
    }

    public function getPhoto()
    {
        if ($this->photo == null) {
            if ($this->user->gender == 'M') {
                return asset("assets/img/avatar-M.png");
            } else {
                return asset("assets/img/avatar-F.png");
            }
        } else {
            $base64Photo = base64_encode($this->photo);
            return "data:image/jpeg;base64," . $base64Photo;
        }
    }

    public function getCover()
    {
        if ($this->cover == null) {
            return "https://source.unsplash.com/950x200/?nature";
        } else {
            $base64Photo = base64_encode($this->cover);
            return "data:image/jpeg;base64," . $base64Photo;
        }
    }

    public function deletePhoto()
    {
        $this->photo = null;
        return $this->save();
    }

    public function deleteCover()
    {
        $this->cover = null;
        return $this->save();
    }

    public function getCityName()
    {
        global $cities;
        return $cities[$this->city];
    }

    public function getDpartmentName()
    {
        global $hospitalDepartments;
        return $hospitalDepartments[$this->department];
    }

    public function getHospitalName()
    {
        global $hospitals;
        if ($this->hospital === "0") {
            return $this->other_hospital;
        } else {
            return $hospitals[$this->hospital];
        }
    }
}
