<?php

namespace App\Http\Controllers;

use App\Models\NotificationSettings;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Validation\Rule;

class NotificationSettingsController extends Controller
{
    public function updateProfileNotificationSettings(Request $request)
    {
        require_once app_path('Helpers/constants.php');
        $notificationKeys = array_keys($notifications);
        $request->validate([
            'notifications' => [
                'array',
                Rule::in($notificationKeys),
            ],
        ]);
        $flags = $request->notifications == null ? [] : $request->notifications;
        $user = User::find(session('userid'));
        $notificationSettings = $user->notificationSettings;
        if (!$notificationSettings) {
            $notificationSettings = new NotificationSettings();
            $notificationSettings->user_id = $user->id;
        }
        try {
            $status = $notificationSettings->updateSettings($flags);
        } catch (Exception $e) {
            $status = false;
        }

        if ($status) {
            return redirect()->back()->with('success', 'Notification Settings updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update Notification Settings.');
        }
    }
}
