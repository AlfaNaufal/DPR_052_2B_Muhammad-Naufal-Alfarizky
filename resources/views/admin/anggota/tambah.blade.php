@extends('layouts.app')

@section('title', 'Tambah Anggota DPR')

@section('content')
<div class="container mx-auto max-w-lg">
    <div class="bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Tambah Data Anggota Baru</h1>
        
        <form action="{{ route('admin.anggota.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">

                {{-- Kolom Kiri --}}
                <div class="space-y-4">
                    {{-- Gelar Depan --}}
                    <div>
                        <label for="gelar_depan" class="block text-sm font-medium text-gray-700">Gelar Depan</label>
                        <input type="text" name="gelar_depan" id="gelar_depan" placeholder="Contoh: Drs." class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    {{-- Nama Depan --}}
                    <div>
                        <label for="nama_depan" class="block text-sm font-medium text-gray-700">Nama Depan</label>
                        <input type="text" name="nama_depan" id="nama_depan" placeholder="Nama depan anggota" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    {{-- Nama Belakang --}}
                    <div>
                        <label for="nama_belakang" class="block text-sm font-medium text-gray-700">Nama Belakang</label>
                        <input type="text" name="nama_belakang" id="nama_belakang" placeholder="Nama belakang anggota" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                        

                </div>

                {{-- Kolom Kanan --}}
                <div class="space-y-4">

                    {{-- Gelar Belakang --}}
                    <div>
                        <label for="gelar_belakang" class="block text-sm font-medium text-gray-700">Gelar Belakang</label>
                        <input type="text" name="gelar_belakang" id="gelar_belakang" placeholder="Contoh: S.H., M.Kn" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    {{-- Jabatan --}}
                    <div>
                        <label for="jabatan" class="block text-sm font-medium text-gray-700">Jabatan</label>
                        <select id="jabatan" name="jabatan" required class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="Ketua">Ketua</option>
                            <option value="Wakil Ketua">Wakil Ketua</option>
                            <option value="Anggota">Anggota</option>
                        </select>
                    </div>

                    {{-- Status Pernikahan --}}
                    <div>
                        <label for="status_pernikahan" class="block text-sm font-medium text-gray-700">Status Pernikahan</label>
                        <select id="status_pernikahan" name="status_pernikahan" required class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="Kawin">Kawin</option>
                            <option value="Belum Kawin">Belum Kawin</option>
                            <option value="Cerai Hidup">Cerai Hidup</option>
                            <option value="Cerai Mati">Cerai Mati</option>
                        </select>
                    </div>
                    <div>
                        <label for="jumlah_anak" class="block text-sm font-medium text-gray-700">Jumlah Anak</label>
                        <input type="number" name="jumlah_anak" id="jumlah_anak" value="0" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
                    </div>
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-end space-x-4 mt-8">
                <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection