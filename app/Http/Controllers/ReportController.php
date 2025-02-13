<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visit;
use App\VisitStatusEnum;

class ReportController extends Controller
{
    public function recap(Request $request)
    {
        $status = $request->input('status');
        $query = Visit::whereIn('status', [VisitStatusEnum::CANCELLED, VisitStatusEnum::COMPLETED]);

        if ($status) {
            $query->where('status', $status);
        }

        $visits = $query->paginate(10);
        $usePagination = true;

        return view('admin.recap', compact('visits', 'usePagination'));
    }

    public function all()
    {
        $visits = Visit::whereIn('status', [VisitStatusEnum::CANCELLED, VisitStatusEnum::COMPLETED])->get();
        $usePagination = false;

        return view('admin.recap', compact('visits', 'usePagination'));
    }
    public function filter(Request $request)
    {
        $status = $request->input('status');
        $query = Visit::whereIn('status', [VisitStatusEnum::CANCELLED, VisitStatusEnum::COMPLETED]);

        if ($status) {
            $query->where('status', $status);
        }

        $visits = $query->paginate(10);
        $usePagination = true;

        return view('admin.recap', compact('visits', 'usePagination'));
    }

    public function exportVisits(Request $request)
    {
        $visits = Visit::whereIn('status', [
            VisitStatusEnum::PENDING,
            VisitStatusEnum::VERIFIED,
            VisitStatusEnum::ONGOING
        ])->get();

        // Implement export logic here
    }

    public function exportRecap(Request $request)
    {
        $visits = Visit::whereIn('status', [
            VisitStatusEnum::CANCELLED,
            VisitStatusEnum::COMPLETED
        ])->get();

        // Implement export logic here
    }

    public function exportVisit($id)
    {
        // Implement export single visit logic
    }
}
