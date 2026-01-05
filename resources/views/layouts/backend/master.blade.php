<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - AroundUz</title>

    @include('partials.backend._head')
</head>
<body class="bg-gray-50">

<div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    @include('partials.backend.sidebar')

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Topbar -->
        @include('partials.backend.topbar')

        <!-- Page Content -->
        <main class="flex-1 overflow-y-auto bg-gray-50 p-4 lg:p-6">
            @yield('content')
        </main>

        <!-- Footer -->
        @include('partials.backend.footer')
    </div>
</div>

@include('partials.backend._scripts')

</body>
</html>
