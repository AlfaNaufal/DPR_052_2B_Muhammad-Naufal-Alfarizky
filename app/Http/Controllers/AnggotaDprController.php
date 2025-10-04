<?php

namespace App\Http\Controllers;

use App\Models\AnggotaDpr;
use Illuminate\Http\Request;

class AnggotaDprController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $anggota = AnggotaDpr::all();

        // return view('admin.dashboard', compact('anggota'));

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

        return view('admin.dashboard', compact('anggota'));
    }
    
    /**
     * Show the form for creating a new resource.
    */
    public function create()
    {
        return view('admin.anggota.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'gelar_depan' => 'nullable|string|max:50',
            'nama_depan' => 'required|string|max:100',
            'nama_belakang' => 'nullable|string|max:100',
            'gelar_belakang' => 'nullable|string|max:50',
            'jabatan' => 'required|in:Ketua,Wakil Ketua,Anggota',
            'status_pernikahan' => 'required|in:Kawin,Belum Kawin,Cerai Hidup,Cerai Mati',
        ]);

        // Membuat record baru di tabel 'anggota' menggunakan data yang sudah tervalidasi
        AnggotaDpr::create($request->all());

        // Mengalihkan kembali ke halaman utama admin dengan pesan sukses
        return redirect()->route('admin.dashboard')
                         ->with('success', 'Data anggota berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AnggotaDpr $anggota)
    {
        return view('admin.anggota.detail', compact('anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AnggotaDpr $anggota)
    {
        return view('admin.anggota.edit', ['anggota' => $anggota]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AnggotaDpr $anggota)
    {
        $request->validate([
            'gelar_depan' => 'nullable|string|max:50',
            'nama_depan' => 'required|string|max:100',
            'nama_belakang' => 'nullable|string|max:100',
            'gelar_belakang' => 'nullable|string|max:50',
            'jabatan' => 'required|in:Ketua,Wakil Ketua,Anggota',
            'status_pernikahan' => 'required|in:Kawin,Belum Kawin,Cerai Hidup,Cerai Mati',
        ]);

        // Memperbarui record anggota dengan data yang sudah tervalidasi
        $anggota->update($request->all());

        // Mengalihkan kembali ke halaman utama admin dengan pesan sukses
        return redirect()->route('admin.dashboard')
                         ->with('success', 'Data anggota berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnggotaDpr $anggota)
    {
        $anggota->delete();

        return redirect()->route('admin.dashboard')
                         ->with('success', 'Data anggota berhasil dihapus.');
    }
}