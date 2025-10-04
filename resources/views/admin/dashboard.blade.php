@extends('layouts.app')
@section('title', 'Dashboard Admin')

@section('content')
    <div class="container mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Data Anggota DPR</h1>


        </div>

        <div class="flex flex-col">

            <div class="flex justify-between my-4">
                
                <form action="{{ route('admin.dashboard') }}" method="GET" class="flex items-center">
                    <input type="text" name="search" placeholder="Cari anggota..." class="border rounded-l-md px-4 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ request('search') }}">
                    <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-r-md hover:bg-blue-700">Cari</button>
                </form>
                
                <a href="{{ route('admin.anggota.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    + Tambah Data
                </a>
                
            </div>

            
            <div class="bg-white shadow-md rounded-lg overflow-hidden">

                <table class="w-full text-sm text-left text-gray-700">
                    <thead class="text-xs text-white uppercase bg-gray-800">
                        <tr>
                            <th scope="col" class="px-6 py-3">ID</th>
                            <th scope="col" class="px-6 py-3">Nama Lengkap</th>
                            <th scope="col" class="px-6 py-3">Jabatan</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            {{-- <th scope="col" class="px-6 py-3">Jumlah Anak</th> --}}
                            <th scope="col" class="px-6 py-3">Detail</th>
                            <th scope="col" class="px-6 py-3">Edit</th>
                            <th scope="col" class="px-6 py-3">Hapus</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($anggota as $item)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-gray-900">{{ $item->id_anggota }}</td>
                                <td class="px-6 py-4">{{ $item->gelar_depan }} {{ $item->nama_depan }} {{ $item->nama_belakang }} {{ $item->gelar_belakang }}</td>
                                <td class="px-6 py-4">{{ $item->jabatan }}</td>
                                <td class="px-6 py-4">{{ $item->status_pernikahan }}</td>
                                {{-- <td class="px-6 py-4">{{ $item->jumlah_anak }}</td> --}}
                                <td class="px-6 py-4 space-x-2">
                                    <a href="{{ route('admin.anggota.show', ['anggota' => $item->id_anggota]) }}" class="font-medium text-blue-600 hover:underline">Detail</a>
                                </td>

                                <td class="px-6 py-4 space-x-2">
                                    <a href="{{ route('admin.anggota.edit', ['anggota' => $item->id_anggota]) }}" class="font-medium text-yellow-600 hover:underline">Edit</a>
                                </td>

                                <td class="px-6 py-4 space-x-2">
                                    <form action="{{ route('admin.anggota.destroy', $item->id_anggota) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="font-medium text-red-600 hover:underline p-0 bg-transparent border-none">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    Data anggota tidak ditemukan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection