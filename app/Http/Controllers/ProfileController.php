<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Profile;
use Exception;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function updateProfilePhoto(Request $request)
    {
        $request->validate([
            'user_photo' => 'required|image|max:2048'
        ]);
        $user = User::find(session('userid'));
        $profile = $user->profile;

        if (!$profile) {
            $profile = new Profile();
            $profile->user_id = $user->id;
        }
        try {
            $status = $profile->updatePhoto($request->file('user_photo'));
        } catch (Exception $e) {
            $status = false;
        }
        if ($status) {
            return redirect()->back()->with('success', 'Photo updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update photo.');
        }
    }

    public function updateProfileCover(Request $request)
    {
        $request->validate([
            'user_cover' => 'required|image|max:5120'
        ]);
        $user = User::find(session('userid'));
        $profile = $user->profile;

        if (!$profile) {
            $profile = new Profile();
            $profile->user_id = $user->id;
        }
        try {
            $status = $profile->updateCover($request->file('user_cover'));
        } catch (Exception $e) {
            $status = false;
        }
        if ($status) {
            return redirect()->back()->with('success', 'Cover updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update Cover.');
        }
    }

    public function deleteProfilePhoto()
    {
        $user = User::find(session('userid'));
        $profile = $user->profile;
        $status = $profile->deletePhoto();
        return $status;
    }

    public function deleteProfileCover()
    {
        $user = User::find(session('userid'));
        $profile = $user->profile;
        $status = $profile->deleteCover();
        return $status;
    }

    public function updateProfileBio(Request $request)
    {
        $request->validate([
            'bio' => 'required|string'
        ]);
        $user = User::find(session('userid'));
        $profile = $user->profile;

        if (!$profile) {
            $profile = new Profile();
            $profile->user_id = $user->id;
        }
        $bio = strip_tags($request->bio);
        try {
            $status = $profile->updateBio($bio);
        } catch (Exception $e) {
            $status = false;
        }
        if ($status) {
            return redirect()->back()->with('success', 'Bio updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update Bio.');
        }
    }

    public function updateProfileCareer(Request $request)
    {
        require_once app_path('Helpers/constants.php');
        $request->validate([
            'occupation' => 'required|string',
            'department' => 'required|string',
            'hospital' => 'required|string',
            'city' => [
                'required',
                'string',
                Rule::in(array_keys($cities))
            ]
        ]);

        $user = User::find(session('userid'));
        $profile = $user->profile;
        if (!$profile) {
            $profile = new Profile();
            $profile->user_id = $user->id;
        }
        try {
            $status = $profile->updateCareer($request);
        } catch (Exception $e) {
            $status = false;
        }

        if ($status) {
            return redirect()->back()->with('success', 'Career Info updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update Career Info.');
        }
    }
}
