@extends('layouts.app')
@section('title', 'dashboard')

@section('content')

    <div class="container mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Data angota</h1>
        </div>

        <div class="flex flex-col">

            <div class="flex justify-between my-4">
                
                <form action="{{ route('public.dashboard') }}" method="GET" class="flex items-center">
                    <input type="text" name="search" placeholder="Cari anggota..." class="border rounded-l-md px-4 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ request('search') }}">
                    <button type="submit" class="bg-gray-500 text-white font-bold py-2 px-4 rounded-r-md hover:bg-gray-700">Cari</button>
                </form>
                
            </div>
            
            
            <div class="bg-white shadow-md rounded-lg overflow-hidden">

                <table class="w-full text-sm text-center text-gray-700">
                    <thead class="text-sm text-white uppercase bg-gray-800">
                        <tr>
                            <th scope="col" class="px-6 py-3">ID Anggota</th>
                            <th scope="col" class="px-6 py-3">Nama Lengkap</th>
                            <th scope="col" class="px-6 py-3">Jabatan</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($anggota as $item)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td scope="col" class="px-6 py-3 font-medium text-gray-900">{{ $item->id_anggota }}</td>
                            <td scope="col" class="px-6 py-3">{{ $item->nama_depan }}</td>
                            <td scope="col" class="px-6 py-3">{{ $item->jabatan }}</td>
                            <td scope="col" class="px-6 py-3">{{ $item->status_pernikahan }}</td>
                            <td class="px-6 py-4 space-x-2">
                                <a href="{{ route('public.anggota.detail', ['anggota' => $item->id_anggota]) }}" class="font-medium text-blue-600 hover:underline">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection