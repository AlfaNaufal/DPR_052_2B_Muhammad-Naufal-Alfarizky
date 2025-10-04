@extends('layouts.app')

@section('title', 'Detail Penggajian')

@section('content')
<div class="container mx-auto">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        
        <div class="p-6 border-b">
            <h1 class="text-2xl font-bold text-gray-800">
                Detail Gaji: {{ $anggota->nama_depan }} {{ $anggota->nama_belakang }}
            </h1>
            <p class="text-gray-600 mt-1">Jabatan: {{ $anggota->jabatan }}</p>
        </div>

        <div class="p-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Rincian Komponen Gaji</h2>
            <div class="border rounded-lg overflow-hidden">
                <table class="w-full text-sm text-left text-gray-700">
                    <thead class="text-xs text-white uppercase bg-gray-800">
                        <tr>
                            <th scope="col" class="px-6 py-3">Nama Komponen</th>
                            <th scope="col" class="px-6 py-3">Kategori</th>
                            <th scope="col" class="px-6 py-3">Nominal</th>
                            <th scope="col" class="px-6 py-3">Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($anggota->komponenGaji as $komponen)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $komponen->nama_komponen }}</td>
                            <td class="px-6 py-4">{{ $komponen->kategori }}</td>
                            <td class="px-6 py-4">Rp {{ number_format($komponen->nominal, 0, ',', '.') }}</td>
                            <td class="px-6 py-4">
                                {{-- <form action="{{ route('admin.penggajian.destroy', $komponen->pivot->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus komponen ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-600 hover:underline p-0 bg-transparent border-none">Hapus</button>
                                </form> --}}
                                Delete
                            </td>
                        </tr>
                        @empty
                         <tr>
                            <td colspan="4" class="text-center py-4 text-gray-500">Belum ada komponen gaji yang ditambahkan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot class="bg-gray-50">
                        <tr>
                            <td colspan="2" class="px-6 py-4 text-right font-bold text-gray-800 uppercase">Total Take Home Pay (Bulanan)</td>
                            <td colspan="2" class="px-6 py-4 text-left font-bold text-xl text-gray-900">
                                Rp {{ number_format($anggota->take_home_pay, 0, ',', '.') }}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="mt-6">
                 <a href="{{ route('admin.penggajian.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    &larr; Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection