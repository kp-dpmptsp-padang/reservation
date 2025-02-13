<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visit;
use App\VisitStatusEnum;

class DashboardController extends Controller
{

    private function updatePastVisitsStatus()
    {
        Visit::where('day', '<', now()->startOfDay())
            ->whereNotIn('status', [
                VisitStatusEnum::CANCELLED,
                VisitStatusEnum::COMPLETED
            ])
            ->update([
                'status' => VisitStatusEnum::COMPLETED
            ]);
    }

    public function index()
    {
        $this->updatePastVisitsStatus();

        return view('admin.dashboard');
    }
    private function getStats()
    {
        // Implement logic to fetch dashboard stats
        return [
            'totalVisits' => 100,
            'totalUsers' => 50,
            // Add other stats as needed
        ];
    }

    private function getVisitsChart()
    {
        // Implement logic to fetch visits chart data
        return [
            'labels' => ['January', 'February', 'March'],
            'data' => [10, 20, 30],
            // Add other chart data as needed
        ];
    }
}