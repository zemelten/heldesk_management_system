<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>JU HelpDesk</title>

    <!-- Scripts -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
        <script src = "https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"
        defer >
    </script> --}}



    <link rel="stylesheet" href="{{ asset('allinone/bootstrap-4.min.css') }}" />

    <!-- Below is custom css for login form -->
    <link rel="stylesheet" href="{{ asset('desk_css/custom-login.css') }}" />


    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

    <!-- Icons -->
    <title>HelpDesk</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="{{ asset('main/fonts.googleapis.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">

    {{-- <link rel="stylesheet" href="{{ asset('css/all.min.css') }}"> --}}
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('allinone/adminlte.min.css') }}">
    <!-- Theme Login -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    @yield('styles')

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('allinone/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('allinone/select2-bootstrap4.min.css') }}">

    {{-- date picker  --}}
    <link rel="stylesheet" href="{{ asset('main/gijgo.min.css') }}">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />

    <!-- Include Date Range Picker -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />


    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="{{ asset('main/jquery-3.6.0.min.js') }}" defer></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
    <script src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js" defer></script>


    <!-- Select2 -->
    <script src="{{ asset('allinone/select2.full.min.js') }}" defer></script>
    <script src="{{ asset('allinone/select2.min.js') }}"></script>


    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('allinone/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('allinone/select2-bootstrap4.min.css') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

    <!-- Icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">


    <!-- Small Ionicons Fixes for AdminLTE -->
    <style>
        html {
            background-color: #f4f6f9;
        }

        .nav-icon.icon:before {
            width: 25px;
        }
    </style>
    @livewireStyles
</head>

<body class="hold-transition sidebar-mini layout-fixed ">

    <div id="app" class="wrapper">
        @auth
            <div class="main-header">
                @include('layouts.nav')
            </div>

            @include('layouts.sidebar')
        @endauth
        <main class="content-wrapper p-5">
            @yield('content')
        </main>

    </div>
    @auth
        @include('layouts.footer')
    @endauth

    </div>


    @stack('modals')

    @livewireScripts

    @stack('scripts')

    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    {{-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" /> --}}

    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="//cdn.jqsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.min.js') }}" defer></script>
    {{-- datatable js --}}
    <script src="{{ asset('js/datatable/jquery.dataTables.min.js') }}" defer></script>
    <script src="{{ asset('js/datatable/bootstrap4.min.js') }}" defer></script>


    <!-- Select2 -->
    {{--  --}}
    <script src="{{ asset('allinone/select2.full.min.js') }}" defer></script>
    <script src="{{ asset('allinone/select2.min.js') }}"></script>
    <!-- Select2 -->
    @if (session()->has('success'))
        <script>
            var notyf = new Notyf({
                dismissible: true
            })
            notyf.success('{{ session('success') }}')
        </script>
    @endif


    </script>
    {{-- @include('sweetalert::alert') --}}
</body>
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2({
            // dropdownAutoWidth: true
            //theme: "bootstrap4",
            //  width:'resolve'

        })
    });
</script>

</html>
