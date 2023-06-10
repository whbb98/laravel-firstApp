<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use Exception;
use Illuminate\Validation\Rule;

class CareerController extends Controller
{
    public function addProfileCareerRow(Request $request)
    {
        require_once app_path('Helpers/constants.php');
        $request->validate([
            'career_name' => 'required|string',
            'career_period' => 'required|date',
            'organization' => 'required|string',
            'career_type' => [
                'required',
                'string',
                Rule::in($careerType)
            ]
        ]);

        $user = User::find(session('userid'));
        $career = new Career();
        $career->user_id = $user->id;
        try {
            $status = $career->addCareerRow($request);
        } catch (Exception $e) {
            $status = false;
        }
        if ($status) {
            return redirect()->back()->with('success', 'Career Row Inserted Successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to Insert Career Row');
        }
    }

    public function dropProfileCareerRow($id)
    {
        $userId = session("userid");

        $validator = Validator::make(['id' => $id, 'user_id' => $userId], [
            'id' => 'required|numeric|exists:career,id,user_id,' . $userId
        ]);

        $user = User::find(session('userid'));
        $career = Career::find($id);
        if ($career && $career->user_id == $user->id) {
            try {
                $status = $career->dropCareerRow($id);
            } catch (Exception $e) {
                $status = false;
            }
            if ($status) {
                return "1";
            } else {
                return "0";
            }
        } else {
            return "-1";
        }
    }
}
