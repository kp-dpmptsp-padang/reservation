<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function visits()
    {
        return view('admin.recap');
    }

    public function exportVisits(Request $request)
    {
        // Implement export visits logic
    }

    public function exportVisit($id)
    {
        // Implement export single visit logic
    }
}
