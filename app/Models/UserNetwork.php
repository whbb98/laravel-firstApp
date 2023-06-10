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

    public static function getAllUsers($filteredValues)
    {
        $searchText = $filteredValues["searchQuery"];
        $city = $filteredValues["cityFilter"];
        $hospital = $filteredValues["hospitalFilter"];
        $department = $filteredValues["departmentFilter"];
        $occupation = $filteredValues["occupationFilter"];

        $users = User::where(function ($query) use ($searchText) {
            $query->where('username', 'LIKE', "%{$searchText}%")
                ->orWhere('first_name', 'LIKE', "%{$searchText}%")
                ->orWhere('last_name', 'LIKE', "%{$searchText}%")
                ->orWhere('email', 'LIKE', "%{$searchText}%");
        })->whereHas('profile', function ($query) use ($city, $hospital, $department, $occupation) {
            if ($city !== 'all') {
                $query->where('city', $city);
            }
            if ($hospital !== 'all') {
                $query->where('hospital', $hospital);
            }
            if ($department !== 'all') {
                $query->where('department', $department);
            }
            if (!empty($occupation)) {
                $query->where('occupation', $occupation);
            }
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
}
