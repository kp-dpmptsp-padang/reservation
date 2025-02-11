<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\City;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function provinces()
    {
        $provinces = Province::orderBy('name')->get();
        return response()->json($provinces);
    }

    public function cities($provinceId)
    {
        $cities = City::where('province_id', $provinceId)
            ->orderBy('name')
            ->get();
        return response()->json($cities);
    }
}