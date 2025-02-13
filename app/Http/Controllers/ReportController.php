<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visit;
use App\VisitStatusEnum;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class ReportController extends Controller
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

    public function recap(Request $request)
    {
        $this->updatePastVisitsStatus();

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
        $query = Visit::with(['province', 'city'])
            ->whereIn('status', [
                VisitStatusEnum::PENDING,
                VisitStatusEnum::VERIFIED,
                VisitStatusEnum::ONGOING
            ]);

        // Filter berdasarkan tipe ekspor
        switch ($request->export_type) {
            case 'monthly':
                $query->whereYear('day', $request->monthly_year)
                    ->whereMonth('day', $request->month);
                $period = date('F Y', mktime(0, 0, 0, $request->month, 1, $request->monthly_year));
                break;
                
            case 'yearly':
                $query->whereYear('day', $request->year);
                $period = $request->year;
                break;
                
            case 'custom':
                $query->whereBetween('day', [
                    $request->start_date,
                    $request->end_date
                ]);
                $period = date('d/m/Y', strtotime($request->start_date)) . 
                        ' - ' . 
                        date('d/m/Y', strtotime($request->end_date));
                break;
        }

        $visits = $query->get();

        $pdf = PDF::loadView('admin.visits.exports.pdf', [
            'visits' => $visits,
            'period' => $period
        ])->setPaper('a4', 'landscape');

        return $pdf->download('laporan-kunjungan.pdf');
    }

    public function exportRecap(Request $request)
    {
        $query = Visit::with(['province', 'city'])
            ->whereIn('status', [
                VisitStatusEnum::CANCELLED,
                VisitStatusEnum::COMPLETED,
            ]);

        // Filter berdasarkan tipe ekspor
        switch ($request->export_type) {
            case 'monthly':
                $query->whereYear('day', $request->monthly_year)
                    ->whereMonth('day', $request->month);
                $period = date('F Y', mktime(0, 0, 0, $request->month, 1, $request->monthly_year));
                break;
                
            case 'yearly':
                $query->whereYear('day', $request->year);
                $period = $request->year;
                break;
                
            case 'custom':
                $query->whereBetween('day', [
                    $request->start_date,
                    $request->end_date
                ]);
                $period = date('d/m/Y', strtotime($request->start_date)) . 
                        ' - ' . 
                        date('d/m/Y', strtotime($request->end_date));
                break;
        }

        $visits = $query->get();

        $pdf = PDF::loadView('admin.visits.exports.pdf', [
            'visits' => $visits,
            'period' => $period
        ])->setPaper('a4', 'landscape');

        return $pdf->download('laporan-kunjungan.pdf');
    }

    public function exportVisit($id)
    {
        $visit = Visit::with(['province', 'city'])
            ->findOrFail($id);
            
        $pdf = PDF::loadView('admin.visits.exports.single-pdf', [
            'visit' => $visit,
        ])->setPaper('a4', 'portrait'); // Untuk satu data, portrait sudah cukup
            
        return $pdf->download('kunjungan-'.$visit->institution.'.pdf');
    }
}