<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    public function updateContact(Request $request)
    {
        require_once app_path('Helpers/constants.php');
        $request->validate([
            'contact_phone' => 'required|numeric',
            'contact_email' => 'required|email',
            'from_day' => [
                'required',
                'string',
                Rule::in(array_keys($days)),
            ],
            'from_time' => 'required|date_format:H:i',
            'to_day' => [
                'required',
                'string',
                Rule::in(array_keys($days)),
            ],
            'to_time' => 'required|date_format:H:i'
        ]);

        $user = User::find(session("userid"));
        $contact = $user->contact;
        if (!$contact) {
            $contact = new Contact();
            $contact->user_id = $user->id;
        }
        try {
            $status = $contact->updateContact($request);
        } catch (Exception $e) {
            $status = false;
        }
        if ($status) {
            return redirect()->back()->with('success', 'Contact Info updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update Contact Info.');
        }
    }
}
