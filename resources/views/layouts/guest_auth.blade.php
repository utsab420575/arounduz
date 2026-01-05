<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AroundUz') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        skyblue: '#87CEEB',
                        coral: '#FF7F50',
                    }
                }
            }
        }
    </script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('styles')
</head>
<body class="font-sans antialiased">
@yield('content')

@stack('scripts')

<!-- Global Error Handler -->
<script>
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '{{ $error }}',
        confirmButtonColor: '#87CEEB'
    });
    @break
    @endforeach
    @endif

    @if (session('success'))
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '{{ session("success") }}',
        confirmButtonColor: '#87CEEB'
    });
    @endif

    @if (session('status'))
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '{{ session("status") }}',
        confirmButtonColor: '#87CEEB'
    });
    @endif
</script>
</body>
</html>
