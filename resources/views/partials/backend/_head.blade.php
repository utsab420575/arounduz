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
    /* Custom Scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
        height: 8px;
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

    /* Sidebar transition */
    #sidebar {
        transition: transform 0.3s ease-in-out;
    }

    @media (max-width: 1023px) {
        #sidebar.hidden-mobile {
            transform: translateX(-100%);
        }
    }
</style>

@stack('styles')
