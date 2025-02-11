<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Visit;
use App\Models\Province;
use Carbon\Carbon;

class GuestController extends Controller
{
    public function getRegionName($id)
    {
        $province = Province::find($id);
        return $province ? $province->name : $id;
    }

    public function home()
    {
        $totalVisits = Visit::count();
        
        $visitsThisMonth = Visit::whereMonth('day', Carbon::now()->month)
            ->whereYear('day', Carbon::now()->year)
            ->count();
        
        $visitsToday = Visit::whereDate('day', Carbon::today())->count();

        $topCities = Visit::select('cities.name as city', DB::raw('count(*) as total'))
            ->join('cities', 'visits.city', '=', 'cities.id')
            ->groupBy('cities.id', 'cities.name')
            ->orderBy('total', 'desc')
            ->limit(5)
            ->get();

        $topProvinces = Visit::select('provinces.name as province', DB::raw('count(*) as total'))
            ->join('provinces', 'visits.province', '=', 'provinces.id')
            ->groupBy('provinces.id', 'provinces.name')
            ->orderBy('total', 'desc')
            ->limit(5)
            ->get();

        return view('home', compact(
            'totalVisits',
            'visitsThisMonth',
            'visitsToday',
            'topCities',
            'topProvinces'
        ));
    }

    public function reservation()
    {
        return view('reservation');
    }
}