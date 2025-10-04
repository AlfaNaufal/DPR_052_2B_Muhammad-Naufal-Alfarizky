@extends('layouts.app')
@section('title', 'Edit Data Penggajian')

@section('content')
<div class="container mx-auto">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Komponen Gaji: {{ $anggota->nama_depan }}</h1>

    <div class="bg-white shadow-md rounded-lg p-6">
        <form action="{{ route('admin.penggajian.update', $anggota->id_anggota) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Anggota</label>
                <p class="border rounded w-full py-2 px-3 bg-gray-100">{{ $anggota->nama_depan }} {{ $anggota->nama_belakang }} ({{ $anggota->jabatan }})</p>
            </div>

            {{-- Tempat untuk Checkbox --}}
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Pilih Komponen Gaji</label>
                <div class="border rounded p-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach ($semuaKomponenGaji as $item)
                        @if($item->jabatan == $anggota->jabatan || $item->jabatan == 'Semua')
                            <div class="komponen-checkbox">
                                <label class="flex items-center">
                                    <input 
                                        type="checkbox" 
                                        name="id_komponen_gaji[]" 
                                        value="{{ $item->id_komponen_gaji }}" 
                                        class="h-4 w-4 rounded border-gray-300"
                                        {{ in_array($item->id_komponen_gaji, $komponenDimiliki) ? 'checked' : '' }}
                                    >
                                    <span class="ml-2 text-gray-700">{{ $item->nama_komponen }}</span>
                                </label>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">Update Komponen</button>
                <a href="{{ route('admin.penggajian.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
