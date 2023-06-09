<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;

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
        echo '<pre>';
        print_r($request->all());
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

    public function dropProfileCareerRow(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric'
        ]);
        $id = $request->id;

        $user = User::find(session('userid'));
        $career = Career::find($id);
        if ($career && $career->user_id == $user->id) {
            try {
                $status = $career->dropCareerRow($id);
            } catch (Exception $e) {
                $status = false;
            }
            if ($status) {
                return "deleted successfully";
                return redirect()->back()->with('success', 'Career row deleted Successfully.');
            } else {
                return "delete error";
                return redirect()->back()->with('error', 'Failed to delete Career row');
            }
        } else {
            return "need delete permission";
            return redirect()->back()->with('error', 'Access Denied!');
        }
    }
}
