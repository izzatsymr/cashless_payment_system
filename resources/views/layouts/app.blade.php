<!DOCTYPE html>
<html lang="en">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Izzat Syamir">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Cashless Payment System For Scool.">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Cashless Payment System For School</title>
</head>

<body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg">
    <!-- Root -->
    <div class="nk-app-root">
        <!-- main  -->
        <div class="nk-main">
            @include('layouts.sidebar')
            <!-- wrap -->
            <div class="nk-wrap">
                @include('layouts.nav')
                <!-- content -->
                <div class="nk-content">
                    @yield('content')
                </div> <!-- .nk-content -->
                @include('layouts.footer')
            </div> <!-- .nk-wrap -->
        </div> <!-- .nk-main -->
    </div> <!-- .nk-app-root -->
</body>

<!-- JavaScript -->
<link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style.css?v1.1.2') }}">
<script src="{{ asset('assets/js/bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="{{ asset('assets/js/charts/analytics-chart.js') }}"></script>
<script src="{{ asset('assets/js/data-tables/data-tables.js') }}"></script>

@if(session()->has('success'))
<script>
    Swal.fire({
        title: "Success!",
        text: "{{ session('success') }}",
        icon: "success"
    });
</script>
@endif
<script>
    function confirmDelete(userId) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#603cfc',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm' + userId).submit();
            }
        });
    }
</script>

</html>