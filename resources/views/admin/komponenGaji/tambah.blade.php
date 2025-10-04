@extends('layouts.app')

@section('title', 'Tambah Komponen Gaji')

@section('content')
<div class="container mx-auto max-w-lg">
    <div class="bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Tambah Komponen Gaji Baru</h1>

        <form action="{{ route('admin.komponenGaji.store') }}" method="POST">
            @csrf
            <div class="space-y-4">
                {{-- Nama Komponen --}}
                <div>
                    <label for="nama_komponen" class="block text-sm font-medium text-gray-700">Nama Komponen</label>
                    <input type="text" name="nama_komponen" id="nama_komponen" placeholder="Contoh: Tunjangan Beras" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                {{-- Kategori --}}
                <div>
                    <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                    <select id="kategori" name="kategori" required class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="Gaji Pokok">Gaji Pokok</option>
                        <option value="Tunjangan Melekat">Tunjangan Melekat</option>
                        <option value="Tunjangan Lain">Tunjangan Lain</option>
                    </select>
                </div>

                {{-- Jabatan --}}
                <div>
                    <label for="jabatan" class="block text-sm font-medium text-gray-700">Berlaku untuk Jabatan</label>
                    <select id="jabatan" name="jabatan" required class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="Semua">Semua</option>
                        <option value="Ketua">Ketua</option>
                        <option value="Wakil Ketua">Wakil Ketua</option>
                        <option value="Anggota">Anggota</option>
                    </select>
                </div>

                {{-- Nominal --}}
                <div>
                    <label for="nominal" class="block text-sm font-medium text-gray-700">Nominal (Rp)</label>
                    <input type="number" name="nominal" id="nominal" placeholder="Contoh: 5000000" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                
                {{-- Satuan --}}
                <div>
                    <label for="satuan" class="block text-sm font-medium text-gray-700">Satuan</label>
                    <select id="satuan" name="satuan" required class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="Bulan">Bulan</option>
                        <option value="Hari">Hari</option>
                        <option value="Periode">Periode</option>
                    </select>
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-end space-x-4 mt-8">
                <a href="{{ route('admin.komponenGaji.index') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection