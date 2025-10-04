@extends('layouts.app')

@section('title', 'Edit Anggota DPR')

@section('content')
<div class="container mx-auto max-w-lg">
    <div class="bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Edit Data Anggota</h1>

        {{-- Form akan dikirim ke route 'admin.anggota.update' menggunakan metode PUT --}}
        <form action="{{ route('admin.anggota.update', $anggota->id_anggota) }}" method="POST">
            @csrf
            @method('PUT') {{-- Wajib untuk proses update --}}

            <div class="space-y-4">
                {{-- Gelar Depan --}}
                <div>
                    <label for="gelar_depan" class="block text-sm font-medium text-gray-700">Gelar Depan</label>
                    <input type="text" name="gelar_depan" id="gelar_depan" value="{{ $anggota->gelar_depan }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                {{-- Nama Depan --}}
                <div>
                    <label for="nama_depan" class="block text-sm font-medium text-gray-700">Nama Depan</label>
                    <input type="text" name="nama_depan" id="nama_depan" value="{{ $anggota->nama_depan }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                {{-- Nama Belakang --}}
                <div>
                    <label for="nama_belakang" class="block text-sm font-medium text-gray-700">Nama Belakang</label>
                    <input type="text" name="nama_belakang" id="nama_belakang" value="{{ $anggota->nama_belakang }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                {{-- Gelar Belakang --}}
                <div>
                    <label for="gelar_belakang" class="block text-sm font-medium text-gray-700">Gelar Belakang</label>
                    <input type="text" name="gelar_belakang" id="gelar_belakang" value="{{ $anggota->gelar_belakang }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                {{-- Jabatan --}}
                <div>
                    <label for="jabatan" class="block text-sm font-medium text-gray-700">Jabatan</label>
                    <select id="jabatan" name="jabatan" required class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="Ketua" {{ $anggota->jabatan == 'Ketua' ? 'selected' : '' }}>Ketua</option>
                        <option value="Wakil Ketua" {{ $anggota->jabatan == 'Wakil Ketua' ? 'selected' : '' }}>Wakil Ketua</option>
                        <option value="Anggota" {{ $anggota->jabatan == 'Anggota' ? 'selected' : '' }}>Anggota</option>
                    </select>
                </div>

                {{-- Status Pernikahan --}}
                <div>
                    <label for="status_pernikahan" class="block text-sm font-medium text-gray-700">Status Pernikahan</label>
                    <select id="status_pernikahan" name="status_pernikahan" required class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="Kawin" {{ $anggota->status_pernikahan == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                        <option value="Belum Kawin" {{ $anggota->status_pernikahan == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                        <option value="Cerai Hidup" {{ $anggota->status_pernikahan == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                        <option value="Cerai Mati" {{ $anggota->status_pernikahan == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                    </select>
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-end space-x-4 mt-8">
                <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection