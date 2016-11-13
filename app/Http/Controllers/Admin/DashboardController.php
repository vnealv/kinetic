<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Entry;

class DashboardController extends Controller
{
    public function countTowns(Request $request)
    {
        $company_id = \Auth::user()->company->id;
        $data['town_count'] = Entry::countTown($company_id)->get();
        return response()->json($data, 200);
    }

    public function countStates(Request $request)
    {
        $company_id = \Auth::user()->company->id;
        $data['state_count'] = Entry::countState($company_id)->get();
        return response()->json($data, 200);
    }
}
