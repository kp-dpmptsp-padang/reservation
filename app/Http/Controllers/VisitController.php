<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Visit;
use App\AttachmentTypeEnum;
use App\VisitStatusEnum;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class VisitController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'whatsapp_number' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'province_id' => 'required|exists:provinces,id', 
            'city_id' => 'required|exists:cities,id',
            'address' => 'required|string|max:1000',
            'homestay' => 'required|string|max:255',
            'day' => 'required|date|after_or_equal:today',
            'clock' => 'required|date_format:H:i',
            'topic' => 'required|string|max:1000',
            'group_size' => 'required|integer|min:1',
            'group_leader' => 'required|string|max:255',
            'description' => 'nullable|string|max:2000',
            'letter_file' => [
                'nullable',
                'file',
                function ($attribute, $value, $fail) {
                    if ($value) {
                        $mimeType = $value->getMimeType();
                        $extension = strtolower($value->getClientOriginalExtension());
                        
                        $validMimeTypes = [
                            'application/pdf',
                            'application/x-pdf',
                            'application/octet-stream', 
                            'image/jpeg',
                            'image/jpg',
                            'image/png'
                        ];
                        
                        if ($mimeType === 'application/octet-stream' && $extension === 'pdf') {
                            return; 
                        }
                        
                        if (!in_array($mimeType, $validMimeTypes)) {
                            $fail('File surat harus berformat JPG, JPEG, PNG, atau PDF.');
                        }
                    }
                },
                'max:3072'  
            ]
        ], [
            'required' => 'Pastikan data yang wajib diisi sudah diisi dengan benar dan valid',
            'email' => 'Format email tidak valid',
            'date' => 'Format tanggal tidak valid',
            'after_or_equal' => 'Tanggal kunjungan harus hari ini atau setelahnya',
            'date_format' => 'Format waktu tidak valid',
            'integer' => 'Jumlah rombongan harus berupa angka',
            'min' => 'Jumlah rombongan minimal 1 orang',
            'letter_file.max' => 'Ukuran file surat tidak boleh lebih dari 3MB'
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Pastikan data yang wajib diisi sudah diisi dengan benar dan valid',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $attachmentPath = null;
            $attachmentType = null;
            $attachmentMimeType = null;

            if ($request->hasFile('letter_file')) {
                $file = $request->file('letter_file');
                
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                
                $attachmentPath = $file->storeAs('visit_letters', $filename, 'public');
                
                $mimeType = $file->getMimeType();
                $attachmentMimeType = $mimeType;
                
                if (str_contains($mimeType, 'image')) {
                    $attachmentType = AttachmentTypeEnum::IMAGE;
                } elseif ($mimeType === 'application/pdf') {
                    $attachmentType = AttachmentTypeEnum::DOCUMENT;
                } else {
                    $attachmentType = AttachmentTypeEnum::OTHER;
                }
            }

            $successToken = Str::random(64);

            $visit = Visit::create([
                'name' => $request->name,
                'institution' => $request->institution,
                'phone_number' => $request->phone_number,
                'whatsapp_number' => $request->whatsapp_number,
                'email' => $request->email,
                'province_id' => $request->province_id, 
                'city_id' => $request->city_id,
                'address' => $request->address,
                'homestay' => $request->homestay,
                'day' => $request->day,
                'clock' => $request->clock,
                'topic' => $request->topic,
                'group_size' => $request->group_size,
                'group_leader' => $request->group_leader,
                'description' => $request->description,
                'attachment_path' => $attachmentPath,
                'attachment_type' => $attachmentType,
                'attachment_mime_type' => $attachmentMimeType,
                'success_token' => $successToken,
                'token_expires_at' => now()->addHours(1)
            ]);

            session()->flash('reservation_success', [
                'visit_id' => $visit->id,
                'name' => $visit->name,
                'day' => $visit->day,
                'clock' => $visit->clock,
                'success_token' => $successToken
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Permohonan kunjungan berhasil dikirim!',
                'redirect' => route('reservation.success', ['token' => $successToken])
            ]);

        } catch (\Exception $e) {
            if (isset($attachmentPath) && Storage::disk('public')->exists($attachmentPath)) {
                Storage::disk('public')->delete($attachmentPath);
            }

            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan. Silakan coba lagi.'
            ], 500);
        }
    }

    public function showSuccess($token)
    {
        if (!session()->has('reservation_success')) {
            return redirect()->route('reservation');
        }

        $reservationData = session('reservation_success');
        
        if ($reservationData['success_token'] !== $token) {
            return redirect()->route('reservation');
        }

        $visit = Visit::where('success_token', $token)
                     ->where('token_expires_at', '>', now())
                     ->first();

        if (!$visit) {
            return redirect()->route('reservation');
        }

        $visit->update([
            'success_token' => null,
            'token_expires_at' => null
        ]);

        return view('success', [
            'visit' => $visit,
            'whatsappNumber' => env('WHATSAPP_ADMIN_NUMBER', '6281234567890')
        ]);
    }

    public function index(Request $request)
    {
        $visits = Visit::with(['province', 'city'])
                       ->whereNotIn('status', [VisitStatusEnum::COMPLETED, VisitStatusEnum::CANCELLED])
                       ->orderBy('day', 'asc')
                       ->orderBy('clock', 'asc')
                       ->paginate(10);
        $usePagination = true;
        return view('admin.visit', compact('visits', 'usePagination'));
    }

    public function all(Request $request)
    {
        $visits = Visit::with(['province', 'city'])
                       ->whereNotIn('status', [VisitStatusEnum::COMPLETED, VisitStatusEnum::CANCELLED])
                       ->orderBy('day', 'asc')
                       ->orderBy('clock', 'asc')
                       ->get();
        $usePagination = false;
        return view('admin.visit', compact('visits', 'usePagination'));
    }

    public function filter(Request $request)
    {
        $status = $request->query('status');
        $visits = Visit::with(['province', 'city'])
                       ->where('status', $status)
                       ->orderBy('day', 'asc')
                       ->orderBy('clock', 'asc')
                       ->paginate(10);
        $usePagination = true;
        return view('admin.visit', compact('visits', 'usePagination'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'whatsapp_number' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'province' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:1000',
            'homestay' => 'required|string|max:255',
            'day' => 'required|date|after_or_equal:today',
            'clock' => 'required|date_format:H:i',
            'topic' => 'required|string|max:1000',
            'group_size' => 'required|integer|min:1',
            'group_leader' => 'required|string|max:255',
            'description' => 'nullable|string|max:2000',
            'letter_file' => [
                'nullable',
                'file',
                function ($attribute, $value, $fail) {
                    if ($value) {
                        $mimeType = $value->getMimeType();
                        $extension = strtolower($value->getClientOriginalExtension());
                        
                        $validMimeTypes = [
                            'application/pdf',
                            'application/x-pdf',
                            'application/octet-stream', 
                            'image/jpeg',
                            'image/jpg',
                            'image/png'
                        ];
                        
                        if ($mimeType === 'application/octet-stream' && $extension === 'pdf') {
                            return; 
                        }
                        
                        if (!in_array($mimeType, $validMimeTypes)) {
                            $fail('File surat harus berformat JPG, JPEG, PNG, atau PDF.');
                        }
                    }
                },
                'max:3072'  
            ]
        ], [
            'required' => 'Pastikan data yang wajib diisi sudah diisi dengan benar dan valid',
            'email' => 'Format email tidak valid',
            'date' => 'Format tanggal tidak valid',
            'after_or_equal' => 'Tanggal kunjungan harus hari ini atau setelahnya',
            'date_format' => 'Format waktu tidak valid',
            'integer' => 'Jumlah rombongan harus berupa angka',
            'min' => 'Jumlah rombongan minimal 1 orang',
            'letter_file.max' => 'Ukuran file surat tidak boleh lebih dari 3MB'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $visit = Visit::findOrFail($id);

            $attachmentPath = $visit->attachment_path;
            $attachmentType = $visit->attachment_type;
            $attachmentMimeType = $visit->attachment_mime_type;

            if ($request->hasFile('letter_file')) {
                if ($attachmentPath && Storage::disk('public')->exists($attachmentPath)) {
                    Storage::disk('public')->delete($attachmentPath);
                }

                $file = $request->file('letter_file');
                
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                
                $attachmentPath = $file->storeAs('visit_letters', $filename, 'public');
                
                $mimeType = $file->getMimeType();
                $attachmentMimeType = $mimeType;
                
                if (str_contains($mimeType, 'image')) {
                    $attachmentType = AttachmentTypeEnum::IMAGE;
                } elseif ($mimeType === 'application/pdf') {
                    $attachmentType = AttachmentTypeEnum::DOCUMENT;
                } else {
                    $attachmentType = AttachmentTypeEnum::OTHER;
                }
            }

            $visit->update([
                'name' => $request->name,
                'institution' => $request->institution,
                'phone_number' => $request->phone_number,
                'whatsapp_number' => $request->whatsapp_number,
                'email' => $request->email,
                'province' => $request->province,
                'city' => $request->city,
                'address' => $request->address,
                'homestay' => $request->homestay,
                'day' => $request->day,
                'clock' => $request->clock,
                'topic' => $request->topic,
                'group_size' => $request->group_size,
                'group_leader' => $request->group_leader,
                'description' => $request->description,
                'attachment_path' => $attachmentPath,
                'attachment_type' => $attachmentType,
                'attachment_mime_type' => $attachmentMimeType,
            ]);

            return redirect()->route('visits.index')->with('success', 'Data kunjungan berhasil diperbarui!');

        } catch (\Exception $e) {
            if (isset($attachmentPath) && Storage::disk('public')->exists($attachmentPath)) {
                Storage::disk('public')->delete($attachmentPath);
            }

            return redirect()->route('visits.index')->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }

    public function deny(Request $request, $id)
    {
        $visit = Visit::findOrFail($id);
        $visit->delete();

        return redirect()->route('visits.index')->with('success', 'Kunjungan berhasil ditolak.');
    }

    public function verify($id)
    {
        $visit = Visit::findOrFail($id);
        $visit->verify();

        return redirect()->route('visits.index')->with('success', 'Kunjungan berhasil diverifikasi.');
    }

    public function cancel(Request $request, $id)
    {
        $visit = Visit::findOrFail($id);
        $visit->cancel();

        return redirect()->route('visits.index')->with('success', 'Kunjungan berhasil dibatalkan.');
    }
}