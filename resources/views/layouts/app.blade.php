<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Ujian')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <nav class="bg-white shadow-md p-4">
        {{--  --}}
    </nav>

    <main class="container mx-auto p-4">
        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>