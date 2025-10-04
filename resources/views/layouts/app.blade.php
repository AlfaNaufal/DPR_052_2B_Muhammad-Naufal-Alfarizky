<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Ujian')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col h-screen bg-gray-100">

    <nav class="bg-white shadow-md p-4">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-1">
                <div>
                    <a class="text-xl font-bold text-gray-800" href="#">Penggajian DPR</a>
                </div>

                @auth
                <div class="flex items-center space-x-4">
                    @if(auth()->user()->role == 'Admin')
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-gray-800">Dashboard</a>
                        <a href="{{ route('admin.komponenGaji.index') }}" class="text-gray-600 hover:text-gray-800">Komponen Gaji</a>
                        <a href="{{ route('admin.penggajian.index') }}" class="text-gray-600 hover:text-gray-800">Penggajian</a>
                    @elseif(auth()->user()->role == 'Public')
                        <a href="{{ route('public.dashboard') }}" class="text-gray-600 hover:text-gray-800">Dashboard</a>
                        <a href="{{ route('public.penggajian.index') }}" class="text-gray-600 hover:text-gray-800">Penggajian</a>
                    @endif
                    
                    <form action="{{ route('logout') }}" method="GET">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Logout</button>
                    </form>
                </div>
                @endauth

                @guest
                {{-- <div>
                    <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Login</a>
                </div> --}}
                @endguest
            </div>
        </div>
    </nav>

    <main class="container mx-auto p-4 flex-grow">
        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>