@extends('layouts.app')

@section('title', 'Kelola Data Penggajian')

@section('content')
    <div class="container mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Kelola Data Penggajian</h1>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        
        <div class="flex flex-col">
            <div class="flex justify-between my-4">
                <form action="{{ route('admin.penggajian.index') }}" method="GET" class="flex items-center">
                    <input type="text" name="search" placeholder="Cari nama anggota..." class="border rounded-l-md px-4 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ request('search') }}">
                    <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-r-md hover:bg-blue-700">Cari</button>
                </form>

                <a href="{{ route('admin.penggajian.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    + Tambah Penggajian
                </a>
            </div>

            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="w-full text-sm text-center text-gray-700">
                    <thead class="text-xs text-white uppercase bg-gray-800">
                        <tr>
                            <th scope="col" class="px-6 py-3">ID Anggota</th>
                            <th scope="col" class="px-6 py-3">Nama Lengkap</th>
                            <th scope="col" class="px-6 py-3">Jabatan</th>
                            <th scope="col" class="px-6 py-3">Take Home Pay (Bulanan)</th>
                            <th scope="col" class="px-6 py-3">Detail</th>
                            <th scope="col" class="px-6 py-3">Edit</th>
                            <th scope="col" class="px-6 py-3">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($anggotaAll as $anggota)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-gray-900">{{ $anggota->id_anggota }}</td>
                                <td class="px-6 py-4">{{ $anggota->nama_depan }} {{ $anggota->nama_belakang }}</td>
                                <td class="px-6 py-4">{{ $anggota->jabatan }}</td>
                                <td class="px-6 py-4 font-semibold">Rp {{ number_format($anggota->take_home_pay, 0, ',', '.') }}</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.penggajian.show', $anggota->id_anggota) }}" class="font-medium text-blue-600 hover:underline">Detail</a>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#" class="font-medium text-yellow-600 hover:underline">Edit</a>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#" class="font-medium text-red-600 hover:underline">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-gray-500">Data penggajian tidak ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection