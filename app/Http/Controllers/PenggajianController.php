<?php

namespace App\Http\Controllers;

use App\Models\AnggotaDpr;
use App\Models\KomponenGaji;
use Illuminate\Http\Request;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
