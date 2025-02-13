<?php
namespace App\View\Components;
use Illuminate\View\Component;
use App\Models\Visit;
use Carbon\Carbon;

class Graph extends Component
{
    public function __construct()
    {
    }

    public function render()
    {
        $monthlyVisits = collect(range(1, 12))->mapWithKeys(function ($month) {
            $count = Visit::whereYear('day', Carbon::now()->year)
                         ->whereMonth('day', $month)
                         ->count();
            return [$month => $count];
        })->toArray();

        $provinceVisits = Visit::select('provinces.name')
            ->selectRaw('COUNT(*) as total')
            ->join('provinces', 'visits.province_id', '=', 'provinces.id') 
            ->groupBy('provinces.name')
            ->orderByDesc('total')
            ->limit(10)
            ->pluck('total', 'name')
            ->toArray();

        $cityVisits = Visit::select('cities.name')
            ->selectRaw('COUNT(*) as total')
            ->join('cities', 'visits.city_id', '=', 'cities.id') 
            ->groupBy('cities.name')
            ->orderByDesc('total')
            ->limit(10)
            ->pluck('total', 'name')
            ->toArray();

        $monthNames = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];

        return view('components.graph', [
            'monthlyVisits' => $monthlyVisits,
            'provinceVisits' => $provinceVisits,
            'cityVisits' => $cityVisits,
            'monthNames' => $monthNames
        ]);
    }
}