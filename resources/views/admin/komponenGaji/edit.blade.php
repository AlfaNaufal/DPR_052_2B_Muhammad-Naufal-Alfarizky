@extends('layouts.app')

@section('title', 'Edit Komponen Gaji')

@section('content')
<div class="container mx-auto max-w-lg">
    <div class="bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Edit Komponen Gaji</h1>

        <form action="{{ route('admin.komponenGaji.update', $komponenGaji->id_komponen_gaji) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-4">
                {{-- Nama Komponen --}}
                <div>
                    <label for="nama_komponen" class="block text-sm font-medium text-gray-700">Nama Komponen</label>
                    <input type="text" name="nama_komponen" id="nama_komponen" value="{{ $komponenGaji->nama_komponen }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                {{-- Kategori --}}
                <div>
                    <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                    <select id="kategori" name="kategori" required class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="Gaji Pokok" {{ $komponenGaji->kategori == 'Gaji Pokok' ? 'selected' : '' }}>Gaji Pokok</option>
                        <option value="Tunjangan Melekat" {{ $komponenGaji->kategori == 'Tunjangan Melekat' ? 'selected' : '' }}>Tunjangan Melekat</option>
                        <option value="Tunjangan Lain" {{ $komponenGaji->kategori == 'Tunjangan Lain' ? 'selected' : '' }}>Tunjangan Lain</option>
                    </select>
                </div>

                {{-- Jabatan --}}
                <div>
                    <label for="jabatan" class="block text-sm font-medium text-gray-700">Berlaku untuk Jabatan</label>
                    <select id="jabatan" name="jabatan" required class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="Semua" {{ $komponenGaji->jabatan == 'Semua' ? 'selected' : '' }}>Semua</option>
                        <option value="Ketua" {{ $komponenGaji->jabatan == 'Ketua' ? 'selected' : '' }}>Ketua</option>
                        <option value="Wakil Ketua" {{ $komponenGaji->jabatan == 'Wakil Ketua' ? 'selected' : '' }}>Wakil Ketua</option>
                        <option value="Anggota" {{ $komponenGaji->jabatan == 'Anggota' ? 'selected' : '' }}>Anggota</option>
                    </select>
                </div>

                {{-- Nominal --}}
                <div>
                    <label for="nominal" class="block text-sm font-medium text-gray-700">Nominal (Rp)</label>
                    <input type="number" name="nominal" id="nominal" value="{{ $komponenGaji->nominal }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                
                {{-- Satuan --}}
                <div>
                    <label for="satuan" class="block text-sm font-medium text-gray-700">Satuan</label>
                    <select id="satuan" name="satuan" required class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="Bulan" {{ $komponenGaji->satuan == 'Bulan' ? 'selected' : '' }}>Bulan</option>
                        <option value="Hari" {{ $komponenGaji->satuan == 'Hari' ? 'selected' : '' }}>Hari</option>
                        <option value="Periode" {{ $komponenGaji->satuan == 'Periode' ? 'selected' : '' }}>Periode</option>
                    </select>
                </div>
            </div>



            {{-- Tombol Aksi --}}
            <div class="flex justify-end space-x-4 mt-8">
                <a href="{{ route('admin.komponenGaji.index') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection