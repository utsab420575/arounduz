<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Travel Portal - AroundUz')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        skyblue: '#87CEEB',
                        coral: '#FF7F50',
                        lightgray: '#A9A9A9'
                    }
                }
            }
        }
    </script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
        ::-webkit-scrollbar { 
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #87CEEB;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #6db8db;
        }
        body { 
            font-family: 'Inter', sans-serif;
        }
    </style>
    
    @stack('styles')
</head>
<body class="bg-gray-50">
    
    @include('partials.header')
    
    @yield('content')
    
    @include('partials.footer')
    
    @stack('scripts')
    
    <script>
        // SweetAlert Example Functions
        function showSuccessAlert(message) {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: message,
                confirmButtonColor: '#87CEEB'
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
        
        function showConfirmAlert(title, text, callback) {
            Swal.fire({
                title: title,
                text: text,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#87CEEB',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, proceed!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed && callback) {
                    callback();
                }
            });
        }
    </script>
</body>
</html>