<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> @yield('title') | Admin </title>
    <style>
        .nav-active {
            color: #ffffff !important;
            text-decoration: none !important;
        }
    </style>
    <link href="{{ asset('assets/admin/css/styles.css') }}" rel="stylesheet" />
    @yield('css')
</head>

<body class="sb-nav-fixed">
    @include('admin.includes.header')
    <div id="layoutSidenav">
        @include('admin.includes.sidebar')
        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>
            @include('admin.includes.footer')
        </div>
    </div>

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/Admin/js/scripts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    @yield('js')
</body>

</html>