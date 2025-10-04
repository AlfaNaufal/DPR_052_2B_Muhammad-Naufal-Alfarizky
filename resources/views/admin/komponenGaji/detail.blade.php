@extends('layouts.app')

@section('title', 'Detail Komponen Gaji')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-2xl">

    <div class="bg-white rounded-lg shadow-md">
        <div class="bg-gray-800 text-white p-4 rounded-t-lg">
            <h4 class="text-xl font-bold">Detail Komponen: {{ $komponenGaji->nama_komponen }}</h4>
        </div>
        
        <div class="p-6">
            <dl class="space-y-4">
                <div class="grid grid-cols-3 gap-4">
                    <dt class="text-sm font-medium text-gray-500">ID Komponen</dt>
                    <dd class="text-sm text-gray-900 col-span-2">{{ $komponenGaji->id_komponen }}</dd>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <dt class="text-sm font-medium text-gray-500">Nama Komponen</dt>
                    <dd class="text-sm text-gray-900 col-span-2">{{ $komponenGaji->nama_komponen }}</dd>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <dt class="text-sm font-medium text-gray-500">Kategori</dt>
                    <dd class="text-sm text-gray-900 col-span-2">{{ $komponenGaji->kategori }}</dd>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <dt class="text-sm font-medium text-gray-500">Berlaku untuk Jabatan</dt>
                    <dd class="text-sm text-gray-900 col-span-2">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                            {{ $komponenGaji->jabatan }}
                        </span>
                    </dd>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <dt class="text-sm font-medium text-gray-500">Nominal</dt>
                    <dd class="text-sm font-bold text-green-600 col-span-2">Rp {{ number_format($komponenGaji->nominal, 0, ',', '.') }}</dd>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <dt class="text-sm font-medium text-gray-500">Satuan</dt>
                    <dd class="text-sm text-gray-900 col-span-2">{{ $komponenGaji->satuan }}</dd>
                </div>
            </dl>
        </div>
    </div>

    <div class="mt-8">
        <a href="{{ route('admin.komponenGaji.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 shadow">
            &larr; Kembali ke Daftar Komponen
        </a>
    </div>
</div>
@endsection