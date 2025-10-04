<?php

namespace App\Http\Controllers;

use App\Models\KomponenGaji;
use Illuminate\Http\Request;

class KomponenGajiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $komponenGaji = KomponenGaji::all();
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
            'nominal' => 'required|integer',
            'satuan' => 'required|in:Bulan,Hari,Periode',
        ]);

        KomponenGaji::create($request->all());

        return redirect()->route('admin.komponenGaji.index')
                         ->with('success', 'Komponen gaji berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy(KomponenGaji $komponenGaji)
    {
        $komponenGaji->delete();

        return redirect()->route('admin.komponen_gaji')
                         ->with('success', 'Komponen gaji berhasil dihapus.');
    }
}
