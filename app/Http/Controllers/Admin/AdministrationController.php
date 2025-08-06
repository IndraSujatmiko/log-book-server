<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LogBook;
use Illuminate\Http\Request;
use App\Models\SecurityVerification;

class AdministrationController extends Controller
{
    public function index()
    {
        // Pengajuan Kunjungan: Logbook yang belum memiliki verifikasi
        $pendingVisits = LogBook::with(['location', 'inputBy'])
            ->whereDoesntHave('verification')
            ->latest('tanggal_kunjungan')
            ->paginate(10, ['*'], 'pending_page');

        // Riwayat Verifikasi: Logbook yang sudah memiliki verifikasi
        $processedVisits = LogBook::with(['location', 'inputBy', 'verification.user'])
            ->whereHas('verification')
            ->latest('tanggal_kunjungan')
            ->paginate(10, ['*'], 'processed_page');

        return view('admin.administration.index', compact('pendingVisits', 'processedVisits'));
    }

    public function updateStatus(Request $request, LogBook $logBook)
    {
        $request->validate([
            'status' => 'required|in:disetujui,ditolak',
            'catatan' => 'nullable|string|max:255',
        ]);

        // Mencegah verifikasi ganda
        if ($logBook->verification) {
            return back()->with('error', 'Kunjungan ini sudah pernah diverifikasi.');
        }

        $logBook->verification()->create([
            'user_id' => auth()->id(),
            'status_verification' => $request->status,
            'catatan' => $request->catatan,
            'tgl_verification' => now(),
        ]);

        return redirect()->route('admin.administration')->with('success', 'Status kunjungan berhasil diperbarui.');
    }
}
