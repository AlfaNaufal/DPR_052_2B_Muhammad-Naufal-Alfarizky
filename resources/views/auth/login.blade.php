@extends('layouts.app')
@section('title', 'Login')

@section('content')
<div class="flex items-center justify-center h-full">
    <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center">Login</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="my-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="username" name="username" id="username" placeholder="masukkan username" class="w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div class="my-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" placeholder="masukkan password" class="w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm" required>
            </div>
            @if ($errors->any())
                <div class="text-red-500 text-sm">
                    {{ $errors->first() }}
                </div>
            @endif
            <button type="submit" class="w-full my-4 px-2 py-2 font-bold text-white bg-blue-500 rounded-md hover:bg-blue-600">Login</button>
        </form>
    </div>
</div>
@endsection