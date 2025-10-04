<?php

namespace App\Http\Controllers;

use App\Models\AnggotaDpr;
use App\Models\Penggajian;
use App\Models\KomponenGaji;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class PenggajianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggotaAll = AnggotaDpr::all();

        return view('admin.penggajian.index', ['anggotaAll' => $anggotaAll]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $anggota = AnggotaDpr::all();
        // $komponenGaji = KomponenGaji::all();
        
        // return view('admin.penggajian.tambah', compact('anggota', 'komponenGaji'));

        $anggotaSudahPunyaGaji = Penggajian::pluck('id_anggota')->unique();

        $anggota = AnggotaDpr::whereNotIn('id_anggota', $anggotaSudahPunyaGaji)->get();

        $komponenGaji = KomponenGaji::all();
        
        return view('admin.penggajian.tambah', ['anggota'=>$anggota, 'komponenGaji'=>$komponenGaji]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Melakukan validasi input
        $request->validate([
            'id_anggota' => 'required|exists:anggota,id_anggota',
            'id_komponen_gaji' => 'required|array',
            'id_komponen_gaji.*' => 'exists:komponen_gaji,id_komponen_gaji',
        ]);
        
        $anggota = AnggotaDpr::find($request->id_anggota);
        $komponenIds = $request->id_komponen_gaji;
        $berhasilDitambahkan = 0;

        // Makukan perulangan untuk setiap ID komponen yang dikirim dari checkbox
        foreach ($komponenIds as $komponenId) {
            $komponen = KomponenGaji::find($komponenId);

            // Melakukan validasi jabatan dan duplikasi di dalam loop
            if ($komponen && ($komponen->jabatan === 'Semua' || $komponen->jabatan === $anggota->jabatan)) {
                
                $isDuplicate = Penggajian::where('id_anggota', $anggota->id_anggota)
                                          ->where('id_komponen_gaji', $komponenId)
                                          ->exists();
                
                // melakukan penyimpanan data secara satu per satu jika tidak duplikat
                if (!$isDuplicate) {
                    Penggajian::create([
                        'id_anggota' => $anggota->id_anggota,
                        'id_komponen_gaji' => $komponenId,
                    ]);
                    $berhasilDitambahkan++;
                }
            }
        }

        return redirect()->route('admin.penggajian.index')
                         ->with('success', "$berhasilDitambahkan komponen gaji berhasil ditambahkan untuk $anggota->nama_depan.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $anggota = AnggotaDpr::with('komponenGaji')->findOrFail($id);

        return view('admin.penggajian.detail', compact('anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_anggota)
    {
        $anggota = AnggotaDpr::findOrFail($id_anggota);

        $semuaKomponenGaji = KomponenGaji::all();

        $komponenDimiliki = $anggota->komponenGaji()->pluck('penggajian.id_komponen_gaji')->toArray();

        return view('admin.penggajian.edit', compact('anggota', 'semuaKomponenGaji', 'komponenDimiliki'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_anggota)
    {
        $request->validate([
            'id_komponen_gaji' => 'nullable|array',
            'id_komponen_gaji.*' => 'exists:komponen_gaji,id_komponen_gaji',
        ]);

        $anggota = AnggotaDpr::findOrFail($id_anggota);
        
        $komponenIds = $request->input('id_komponen_gaji', []);

        $anggota->komponenGaji()->sync($komponenIds);

        return redirect()->route('admin.penggajian.index')
                         ->with('success', "Data komponen gaji untuk $anggota->nama_depan berhasil diupdate.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_anggota)
    {
        $anggota = AnggotaDpr::findOrFail($id_anggota);

        $anggota->komponenGaji()->detach();

        return redirect()->route('admin.penggajian.index')
                         ->with('success', "Semua data komponen gaji untuk $anggota->nama_depan berhasil dihapus.");
    }
}
