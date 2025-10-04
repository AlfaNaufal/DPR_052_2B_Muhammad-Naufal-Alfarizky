<?php

namespace App\Http\Controllers\Public;

use App\Models\AnggotaDpr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = AnggotaDpr::query();

        // Memeriksa apakah ada input pencarian dari URL (dengan nama 'search')
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;

            $query->where(function ($q) use ($searchTerm) {
                $q->where('nama_depan', 'LIKE', "%{$searchTerm}%")
                ->orWhere('nama_belakang', 'LIKE', "%{$searchTerm}%")
                ->orWhere('jabatan', 'LIKE', "%{$searchTerm}%")
                ->orWhere('id_anggota', $searchTerm);
            });
        }

        // Eksekusi query dan ambil hasilnya
        $anggota = $query->get();

        return view('public.dashboard', compact('anggota'));
    }

    /**
     * Menampilkan Halaman Penggajian
     */
    public function detailAnggota(AnggotaDpr $anggota)
    {
        return view('public.detail', compact('anggota'));
    }

    /**
     * menampilkan Detail Data Anggota
     */
    public function tampilPenggajian(Request $request)
    {
        $query = AnggotaDpr::has('komponenGaji');

        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('nama_depan', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('nama_belakang', 'LIKE', "%{$searchTerm}%");
            });
        }

        $anggotaAll = $query->with('komponenGaji')->orderBy('nama_depan')->paginate(10);

        return view('public.penggajian.index', compact('anggotaAll'));
    }

    /**
     * Display the specified resource.
     */
    public function detailPenggajian(string $id_anggota)
    {
        $anggota = AnggotaDpr::with('komponenGaji')->findOrFail($id_anggota);
        return view('public.penggajian.detail', compact('anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
