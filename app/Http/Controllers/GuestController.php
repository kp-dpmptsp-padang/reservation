<?php
namespace App\Http\Controllers;

use App\Models\City;
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
        return view('home');
    }

    public function reservation()
    {
        $provinces = Province::all();
        $cities = City::all();
        return view('reservation', compact('provinces', 'cities'));
    }

    public function hotelReference()
    {
        return view('hotel');
    }

    public function souvenirReference()
    {
        try {
            $filePath = public_path('storage/data/oleh-oleh.json');
            
            if (!file_exists($filePath)) {
                throw new \Exception("File JSON tidak ditemukan");
            }
            
            $jsonContent = file_get_contents($filePath);
            $souvenirs = json_decode($jsonContent, true);
  
            return view('souvenir', compact('souvenirs'));
            
        } catch (\Exception $e) {
            return view('souvenir', ['souvenirs' => ['oleh-oleh' => []]]);
        }
}
}