@extends('layouts.app')

@section('title', 'Kelola Komponen Gaji')

@section('content')
    <div class="container mx-auto">
        {{-- Header Halaman --}}
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Kelola Komponen Gaji & Tunjangan</h1>
            <a href="{{ route('admin.komponenGaji.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                + Tambah Komponen
            </a>
        </div>

        {{-- Notifikasi Sukses --}}
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        {{-- Container untuk Tabel --}}
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="w-full text-sm text-left text-gray-700">
                <thead class="text-xs text-white uppercase bg-gray-800">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Nama Komponen</th>
                        <th scope="col" class="px-6 py-3">Kategori</th>
                        <th scope="col" class="px-6 py-3">Jabatan</th>
                        <th scope="col" class="px-6 py-3">Nominal</th>
                        <th scope="col" class="px-6 py-3">Satuan</th>
                        <th scope="col" class="px-6 py-3">Edit</th>
                        <th scope="col" class="px-6 py-3">Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($komponenGaji as $item)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $item->id_komponen_gaji}}</td>
                            <td class="px-6 py-4">{{ $item->nama_komponen }}</td>
                            <td class="px-6 py-4">{{ $item->kategori }}</td>
                            <td class="px-6 py-4">{{ $item->jabatan }}</td>
                            <td class="px-6 py-4">Rp {{ number_format($item->nominal, 0, ',', '.') }}</td>
                            <td class="px-6 py-4">{{ $item->satuan }}</td>
                            <td class="px-6 py-4">
                                <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                            </td>
                            <td class="px-6 py-4">
                                <form action="#" method="POST" onsubmit="return confirm('Apakah Anda yakin?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-600 hover:underline p-0 bg-transparent">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">Data komponen gaji tidak ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection