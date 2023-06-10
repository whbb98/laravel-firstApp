<?php

namespace App\Http\Controllers;

use App\Models\UserNetwork;
use Illuminate\Http\Request;

class UserNetworkController extends Controller
{
    public function getAllUsers(Request $request)
    {
        $validatedData = $request->validate([
            'search_query' => 'nullable|string',
            'city_filter' => 'nullable|string',
            'hospital_filter' => 'nullable|string',
            'department_filter' => 'nullable|string',
            'occupation_filter' => 'nullable|string',
        ]);

        $searchQuery = $validatedData['search_query'] ?? '';
        $cityFilter = $validatedData['city_filter'] ?? 'all';
        $hospitalFilter = $validatedData['hospital_filter'] ?? 'all';
        $departmentFilter = $validatedData['department_filter'] ?? 'all';
        $occupationFilter = $validatedData['occupation_filter'] ?? '';

        $filteredValues = [
            "searchQuery" => $searchQuery,
            "cityFilter" => $cityFilter,
            "hospitalFilter" => $hospitalFilter,
            "departmentFilter" => $departmentFilter,
            "occupationFilter" => $occupationFilter
        ];
        $result = UserNetwork::getAllUsers($filteredValues);
        return ($result);
    }
}
