<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Visit;
use Carbon\Carbon;
use App\VisitStatusEnum;

class SummaryStats extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;
        $startOfWeek = Carbon::now()->startOfWeek();

        $stats = [
            [
                'title' => 'Total Kunjungan',
                'value' => Visit::count(),
                'icon' => 'M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z',
                'color' => 'text-blue-600 bg-blue-100'
            ],
            [
                'title' => 'Kunjungan Tahun Ini',
                'value' => Visit::whereYear('day', $currentYear)->count(),
                'icon' => 'M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z',
                'color' => 'text-emerald-600 bg-emerald-100'
            ],
            [
                'title' => 'Kunjungan Bulan Ini',
                'value' => Visit::whereYear('day', $currentYear)
                    ->whereMonth('day', $currentMonth)
                    ->count(),
                'icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z',
                'color' => 'text-purple-600 bg-purple-100'
            ],
            [
                'title' => 'Kunjungan Minggu Ini',
                'value' => Visit::where('day', '>=', $startOfWeek)->count(),
                'icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z',
                'color' => 'text-yellow-600 bg-yellow-100'
            ],
            [
                'title' => 'Kunjungan Selesai',
                'value' => Visit::where('status', VisitStatusEnum::COMPLETED->value)->count(),
                'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
                'color' => 'text-green-600 bg-green-100'
            ],
            [
                'title' => 'Sedang Berlangsung',
                'value' => Visit::where('status', VisitStatusEnum::ONGOING->value)->count(),
                'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
                'color' => 'text-indigo-600 bg-indigo-100'
            ],
            [
                'title' => 'Menunggu Verifikasi',
                'value' => Visit::where('status', VisitStatusEnum::PENDING->value)->count(),
                'icon' => 'M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                'color' => 'text-orange-600 bg-orange-100'
            ],
            [
                'title' => 'Kunjungan Dibatalkan',
                'value' => Visit::where('status', VisitStatusEnum::CANCELLED->value)->count(),
                'icon' => 'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z',
                'color' => 'text-red-600 bg-red-100'
            ],
        ];

        return view('components.summary-stats', ['stats' => $stats]);
    }
}