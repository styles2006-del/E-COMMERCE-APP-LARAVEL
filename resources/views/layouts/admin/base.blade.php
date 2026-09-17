<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $page_title ?? 'E-Commerce Admin' }}</title>
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-minimal/minimal.css" rel="stylesheet">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="h-full bg-slate-50 text-slate-800 font-sans antialiased selection:bg-indigo-500 selection:text-white">
    <div class="min-h-screen flex flex-col md:flex-row">
        <!-- Sidebar Navigation -->
        @include('layouts.admin.partials.sidebar')

        <!-- Main Workspace -->
        <div class="flex-1 flex flex-col min-w-0 md:pl-64 transition-all duration-300">
            <!-- Header Bar -->
            @include('layouts.admin.partials.header')

            <!-- Main Content Area -->
            <main class="flex-1 p-4 md:p-8 max-w-7xl w-full mx-auto">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script>
        // Initialize AOS
        AOS.init({ once: true, offset: 20 });

        // Premium Toast Notifications
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            customClass: {
                popup: 'colored-toast',
                container: 'toast-container'
            }
        });

        @if(session('success'))
            Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}',
                background: '#f0fdf4',
                color: '#166534'
            });
        @endif

        @if(session('error'))
            Toast.fire({
                icon: 'error',
                title: '{{ session('error') }}',
                background: '#fef2f2',
                color: '#991b1b'
            });
        @endif
    </script>
</body>
</html>
