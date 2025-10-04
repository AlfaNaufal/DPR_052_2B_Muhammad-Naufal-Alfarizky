@extends('layouts.app')
@section('title', 'Tambah Data Penggajian')

@section('content')
<div class="container mx-auto">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Tambah Komponen Gaji ke Anggota</h1>

    {{-- Form untuk menambah data penggajian --}}
    <div class="bg-white shadow-md rounded-lg p-6">
        <form action="{{ route('admin.penggajian.store') }}" method="POST">
            @csrf

            {{-- Dropdown untuk memilih anggota --}}
            <div class="mb-4">
                <label for="id_anggota" class="block text-gray-700 text-sm font-bold mb-2">Langkah 1: Pilih Anggota</label>
                <select name="id_anggota" id="pilihAnggota" class="border rounded w-full py-2 px-3 ...">
                    <option value="">-- Pilih Anggota --</option>
                    @foreach ($anggota as $item)
                        <option value="{{ $item->id_anggota }}" data-jabatan="{{ $item->jabatan }}">
                            {{ $item->nama_depan }} {{ $item->nama_belakang }} (Jabatan: {{ $item->jabatan }})
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Tempat untuk checkbox --}}
            <div id="checkbox-container" class="mb-6 hidden">
                <label class="block text-gray-700 text-sm font-bold mb-2">Langkah 2: Pilih Komponen Gaji</label>
                <div class="border rounded p-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach ($komponenGaji as $item)
                        <div class="komponen-checkbox hidden" data-jabatan="{{ $item->jabatan }}">
                            <label class="flex items-center">
                                <input type="checkbox" name="id_komponen_gaji[]" value="{{ $item->id_komponen_gaji }}" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="ml-2 text-gray-700">{{ $item->nama_komponen }}</span>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan Komponen Terpilih</button>
                <a href="{{ route('admin.penggajian.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection


@push('scripts')
<script>
    const anggotaSelect = document.getElementById('pilihAnggota');
    const checkboxContainer = document.getElementById('checkbox-container');
    const allCheckboxes = checkboxContainer.querySelectorAll('.komponen-checkbox');

    anggotaSelect.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const selectedJabatan = selectedOption.getAttribute('data-jabatan');

        if (selectedJabatan) {
            checkboxContainer.classList.remove('hidden');

            allCheckboxes.forEach(checkboxDiv => {
                const komponenJabatan = checkboxDiv.getAttribute('data-jabatan');

                if (komponenJabatan === selectedJabatan || komponenJabatan === 'Semua') {
                    checkboxDiv.classList.remove('hidden');
                } else {
                    checkboxDiv.classList.add('hidden');
                }
            });
        } else {
            checkboxContainer.classList.add('hidden');
        }
    });
</script>
@endpush