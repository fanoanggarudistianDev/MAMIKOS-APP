<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\Penghuni;
use App\Models\Pembayaran;
use App\Models\Pengaduan;
use App\Models\User;

class KosController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();

        if ($user && ($user->role === 'admin' || $user->email === 'admin@kos.com')) {
            $total_kamar = Kamar::count();
            $total_kamar_terisi = Kamar::where('status', 'Terisi')->count();
            $total_kamar_tersedia = Kamar::where('status', 'Tersedia')->count();
            $total_penghuni = Penghuni::count();
            $total_pendapatan = Pembayaran::sum('jumlah_bayar');
            $pendapatan_bulan_ini = Pembayaran::whereMonth('tanggal_bayar', now()->month)
                ->whereYear('tanggal_bayar', now()->year)
                ->sum('jumlah_bayar');
            $total_pengaduan = Pengaduan::where('status_penanganan', 'Proses')->count();

            return view('dashboard', compact(
                'total_kamar',
                'total_kamar_terisi',
                'total_kamar_tersedia',
                'total_penghuni',
                'total_pendapatan',
                'pendapatan_bulan_ini',
                'total_pengaduan'
            ));
        }

        // Default: penghuni dashboard (show linked penghuni data when available)
        $penghuni = null;
        if ($user) {
            $penghuni = $user->penghuni()->with('kamar', 'pembayarans')->first();
        }

        return view('dashboard_penghuni', ['user' => $user, 'penghuni' => $penghuni]);
    }

    public function landing()
    {
        $total_kamar = Kamar::count();
        $total_kamar_terisi = Kamar::where('status', 'Terisi')->count();
        $total_kamar_tersedia = Kamar::where('status', 'Tersedia')->count();
        $total_penghuni = Penghuni::count();
        $total_pendapatan = Pembayaran::sum('jumlah_bayar');
        $pendapatan_bulan_ini = Pembayaran::whereMonth('tanggal_bayar', now()->month)
            ->whereYear('tanggal_bayar', now()->year)
            ->sum('jumlah_bayar');
        $total_pengaduan = Pengaduan::where('status_penanganan', 'Proses')->count();

        return view('landing', compact(
            'total_kamar',
            'total_kamar_terisi',
            'total_kamar_tersedia',
            'total_penghuni',
            'total_pendapatan',
            'pendapatan_bulan_ini',
            'total_pengaduan'
        ));
    }

    public function indexKamar()
    {
        $kamars = Kamar::all();
        return view('kamar.index', compact('kamars'));
    }

    public function storeKamar(Request $request)
    {
        $request->validate([
            'nomor_kamar'   => 'required|unique:kamars,nomor_kamar',
            'harga_bulanan' => 'required|numeric',
        ]);

        Kamar::create(array_merge($request->only(['nomor_kamar', 'harga_bulanan']), ['status' => 'Tersedia']));

        return redirect('/kamar')->with('success', 'Kamar baru berhasil disimpan!');
    }

    public function indexPenghuni()
    {
        $penghunis = Penghuni::with('kamar')->get();
        $kamars = Kamar::where('status', 'Tersedia')->get();
        return view('penghuni.index', compact('penghunis', 'kamars'));
    }

    public function storePenghuni(Request $request)
    {
        $request->validate([
            'nama'          => 'required|string|max:255',
            'no_hp'         => 'required|string|max:20',
            'kamar_id'      => 'required|exists:kamars,id',
            'tanggal_masuk' => 'required|date',
        ]);

        Penghuni::create($request->only(['nama', 'no_hp', 'kamar_id', 'tanggal_masuk']));
        Kamar::where('id', $request->kamar_id)->update(['status' => 'Terisi']);

        return redirect('/penghuni')->with('success', 'Penghuni berhasil didaftarkan!');
    }

    public function indexPembayaran()
    {
        $pembayarans = Pembayaran::with('penghuni.kamar')->get();
        $penghunis = Penghuni::all();
        $total_pendapatan = Pembayaran::sum('jumlah_bayar');
        return view('pembayaran.index', compact('pembayarans', 'penghunis', 'total_pendapatan'));
    }

    public function storePembayaran(Request $request)
    {
        $request->validate([
            'penghuni_id'   => 'required|exists:penghunis,id',
            'jumlah_bayar'  => 'required|numeric',
            'tanggal_bayar' => 'required|date',
        ]);

        Pembayaran::create($request->only(['penghuni_id', 'jumlah_bayar', 'tanggal_bayar']));

        return redirect('/pembayaran')->with('success', 'Pembayaran kas berhasil dicatat!');
    }

    public function destroyPembayaran(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return redirect('/pembayaran')->with('success', 'Pembayaran berhasil dihapus.');
    }

    public function indexPengaduan()
    {
        $pengaduans = Pengaduan::with('penghuni.kamar')->get();
        $penghunis = Penghuni::all();
        $pembayarans = Pembayaran::with('penghuni.kamar')->get();

        return view('pengaduan.index', compact('pengaduans', 'penghunis', 'pembayarans'));
    }

    public function indexUsers()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function indexReports()
    {
        return view('reports.index');
    }

    public function indexSettings()
    {
        return view('settings.index');
    }

    public function storePengaduan(Request $request)
    {
        $request->validate([
            'penghuni_id'       => 'required|exists:penghunis,id',
            'deskripsi_keluhan' => 'required|string',
            'tanggal_pengaduan' => 'required|date',
        ]);

        Pengaduan::create(array_merge($request->only(['penghuni_id', 'deskripsi_keluhan', 'tanggal_pengaduan']), ['status_penanganan' => 'Proses']));

        return redirect('/pengaduan')->with('success', 'Laporan keluhan berhasil disimpan!');
    }
}