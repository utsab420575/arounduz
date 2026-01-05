<script>
    // SweetAlert Functions
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

    // Session Messages
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
        html: '<ul class="text-left text-sm">' +
            @foreach ($errors->all() as $error)
                '<li class="mb-1">{{ $error }}</li>' +
            @endforeach
                '</ul>',
        confirmButtonColor: '#87CEEB'
    });
    @endif

    // Mobile Sidebar Toggle
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('hidden-mobile');
    }

    // Close sidebar on outside click (mobile)
    document.addEventListener('click', function(event) {
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');

        if (window.innerWidth < 1024) {
            if (!sidebar.contains(event.target) && !sidebarToggle.contains(event.target)) {
                sidebar.classList.add('hidden-mobile');
            }
        }
    });
</script>

@stack('scripts')
