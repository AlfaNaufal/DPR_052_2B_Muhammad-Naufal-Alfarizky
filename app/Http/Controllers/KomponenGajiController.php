<?php

namespace App\Http\Controllers;

use App\Models\KomponenGaji;
use Illuminate\Http\Request;

class KomponenGajiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $komponenGaji = KomponenGaji::all();
        // return view('admin.komponenGaji.index', ['komponenGaji' => $komponenGaji]);

        $query = KomponenGaji::query();

        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;


            $query->where(function ($q) use ($searchTerm) {
                $q->where('id_komponen_gaji', 'LIKE', "%{$searchTerm}%")
                ->orWhere('nama_komponen', 'LIKE', "%{$searchTerm}%")
                ->orWhere('kategori', 'LIKE', "%{$searchTerm}%")
                ->orWhere('jabatan', $searchTerm)
                ->orWhere('nominal', $searchTerm)
                ->orWhere('satuan', $searchTerm);
            });
        }

        // Eksekusi query dan ambil hasilnya
        $komponenGaji = $query->get();

        return view('admin.komponenGaji.index', compact('komponenGaji'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.komponenGaji.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_komponen' => 'required|string|max:100',
            'kategori' => 'required|in:Gaji Pokok,Tunjangan Melekat,Tunjangan Lain',
            'jabatan' => 'required|in:Ketua,Wakil Ketua,Anggota,Semua',
            'nominal' => 'required',
            'satuan' => 'required|in:Bulan,Hari,Periode',
        ]);

        KomponenGaji::create($request->all());

        return redirect()->route('admin.komponenGaji.index')
                         ->with('success', 'Komponen gaji berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(KomponenGaji $komponenGaji)
    {
        return view('admin.komponenGaji.detail', ['komponenGaji' => $komponenGaji]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KomponenGaji $komponenGaji)
    {
        return view('admin.komponenGaji.edit', ['komponenGaji' => $komponenGaji]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KomponenGaji $komponenGaji)
    {

        // dd($request);
        
        $request->validate([
            'nama_komponen' => 'required|string|max:100',
            'kategori' => 'required|in:Gaji Pokok,Tunjangan Melekat,Tunjangan Lain',
            'jabatan' => 'required|in:Ketua,Wakil Ketua,Anggota,Semua',
            'nominal' => 'required',
            'satuan' => 'required|in:Bulan,Hari,Periode',
        ]);
        
        

        $komponenGaji->update($request->all());

        return redirect()->route('admin.komponenGaji.index')
                         ->with('success', 'Komponen gaji berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KomponenGaji $komponenGaji)
    {
        $komponenGaji->delete();

        return redirect()->route('admin.komponenGaji.index')
                         ->with('success', 'Komponen gaji berhasil dihapus.');
    }
}
