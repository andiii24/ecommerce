<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    >
    <link
        rel="apple-touch-icon"
        sizes="76x76"
        href="img/apple-icon.png"
    >
    <link
        rel="icon"
        type="image/png"
        href="img/favicon.png"
    >
    <!-- CSRF Token -->
    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    <title>@yield('title')</title>
    <!-- Fonts -->
    <!--     Fonts and icons     -->
    <link
        rel="stylesheet"
        type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700"
    />
    <!-- Nucleo Icons -->
    <link
        href="{{ asset('frontend/css/style.css') }}"
        rel="stylesheet"
    />
    <link
        href="{{ asset('frontend/css/fontawsome.min.css') }}"
        rel="stylesheet"
    />
    <link
        href="{{ asset('frontend/css/owl.carousel.min.css') }}"
        rel="stylesheet"
    />
    <link
        href="{{ asset('frontend/css/owl.theme.default.min.css') }}"
        rel="stylesheet"
    />
    <link
        href="{{ asset('frontend/css/bootstrap5.css') }}"
        rel="stylesheet"
    />
    <!-- Material Icons -->
    <link
        href="https://fonts.googleapis.com/icon?family=Material+Icons+Round"
        rel="stylesheet"
    >
    <link
        href="{{ asset('admin/css/material-dashboard.css') }}"
        rel="stylesheet"
    />
    <!-- Styles -->
    {{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}

    {{-- owl carousel --}}

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    {{-- Google Font --}}
    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto&display=swap"
        rel="stylesheet"
    >

    {{-- Font Awsome --}}

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css" integrity="sha384-z4tVnCr80ZcL0iufVdGQSUzNvJsKjEtqYZjiQrrYKlpGow+btDHDfQWkFjoaz/Zr" crossorigin="anonymous">
</head>

<body class="g-sidenav-show  bg-gray-200">
    @include('layouts.layout.frontnav')
    <div class="content">
        @yield('content')
    </div>


    <!-- Scripts -->
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <!-- Font Awesome Icons -->
    <script
        src="https://kit.fontawesome.com/42d5adcbca.js"
        crossorigin="anonymous"
    ></script>

    {{-- Sweet Alert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    {{-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> --}}

    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    @if (session('status'))
        <script>
            swal("{{ session('status') }}");
        </script> @endif
    @yield('scripts')
</body>

</html>
