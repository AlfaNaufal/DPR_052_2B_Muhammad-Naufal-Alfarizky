@extends('layouts.app')
@section('title', 'dashboard')

@section('content')

        <div class="card">
        <div class="card-header">
            <h1 class="display-6">Dashboard Mahasiswa</h1>
        </div>
        {{-- <div class="card-body">
            <h5 class="card-title">Selamat Datang, {{ auth()->user()->full_name }}!</h5>
            <p class="card-text">Dari sini Anda bisa mengelola mata kuliah Anda atau melihat informasi lainnya.</p>
            <p>Gunakan menu navigasi di atas untuk menjelajahi fitur yang tersedia.</p>
            <a href="{{ route('student.courses.list') }}" class="btn btn-primary">Lihat & Enroll Mata Kuliah</a>
        </div> --}}
    </div>

@endsection