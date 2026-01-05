<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'AroundUz'))</title>

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
                        lightgray: '#A9A9A9',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #87CEEB;
            border-radius: 5px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #6BB6D9;
        }
    </style>

    @stack('styles')
</head>
<body class="font-sans antialiased bg-gray-50">
@include('partials.header_auth')

@yield('content')

@include('partials.footer_auth')

@stack('scripts')

<!-- Global Alert Handler -->
<script>
    function showSuccessAlert(message) {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: message,
            confirmButtonColor: '#87CEEB',
            timer: 3000
        });
    }

    function showErrorAlert(message) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: message,
            confirmButtonColor: '#87CEEB'
        });
    }

    @if (session('success'))
    showSuccessAlert('{{ session("success") }}');
    @endif

    @if (session('error'))
    showErrorAlert('{{ session("error") }}');
    @endif

    @if ($errors->any())
    Swal.fire({
        icon: 'error',
        title: 'Validation Error',
        html: '<ul class="text-left">' +
            @foreach ($errors->all() as $error)
                '<li>{{ $error }}</li>' +
            @endforeach
                '</ul>',
        confirmButtonColor: '#87CEEB'
    });
    @endif
</script>
</body>
</html>
