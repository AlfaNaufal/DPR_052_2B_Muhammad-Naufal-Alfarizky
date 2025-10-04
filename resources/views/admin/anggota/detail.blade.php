@extends('layouts.app')

@section('title', 'Detail Anggota DPR')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-4xl">

        <div class="bg-white rounded-lg shadow-md">
            <div class="bg-gray-800 text-white p-4 rounded-t-lg">
                <h4 class="text-xl font-bold">Data Diri: {{ $anggota->nama_depan }} {{ $anggota->nama_belakang }}</h4>
            </div>
            
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                    
                    {{-- Kolom Kiri --}}
                    <div>
                        <h5 class="font-bold text-lg mb-3 border-b pb-2">Informasi Personal</h5>
                        <dl class="space-y-4">
                            <div class="grid grid-cols-3 gap-4">
                                <dt class="text-sm font-medium text-gray-500 col-span-1">Nama Lengkap</dt>
                                <dd class="text-sm text-gray-900 col-span-2">{{ $anggota->gelar_depan }} {{ $anggota->nama_depan }} {{ $anggota->nama_belakang }} {{ $anggota->gelar_belakang }}</dd>
                            </div>
                            <div class="grid grid-cols-3 gap-4">
                                <dt class="text-sm font-medium text-gray-500 col-span-1">Jabatan</dt>
                                <dd class="text-sm text-gray-900 col-span-2">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                        {{ $anggota->jabatan }}
                                    </span>
                                </dd>
                            </div>
                        </dl>
                    </div>

                    {{-- Kolom Kanan --}}
                    <div>
                        <h5 class="font-bold text-lg mb-3 border-b pb-2">Informasi Keluarga</h5>
                        <dl class="space-y-4">
                            <div class="grid grid-cols-3 gap-4">
                                <dt class="text-sm font-medium text-gray-500 col-span-1">Status Pernikahan</dt>
                                <dd class="text-sm text-gray-900 col-span-2">{{ $anggota->status_pernikahan }}</dd>
                            </div>
                            <div class="grid grid-cols-3 gap-4">
                                <dt class="text-sm font-medium text-gray-500 col-span-1">Jumlah Anak</dt>
                                <dd class="text-sm text-gray-900 col-span-2">{{ $anggota->jumlah_anak ?? '0' }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 shadow">
                &larr; Kembali ke Dashboard
            </a>
        </div>
    </div>
@endsection