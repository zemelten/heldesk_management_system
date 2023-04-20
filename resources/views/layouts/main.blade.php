<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>HelpDesk</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="{{ asset('main/fonts.googleapis.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('main/css/fontawesome.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/all.min.css') }}"> --}}
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('allinone/adminlte.min.css') }}">
    <!-- Theme Login -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    @yield('styles')

    {{-- custom css --}}
    <link rel="stylesheet" href="{{ asset('css/toast.css') }}">

    {{-- Datatable css --}}
    <link rel="stylesheet" href="{{ asset('css/datatable/dataTables.min.css') }}">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('allinone/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('allinone/select2-bootstrap4.min.css') }}">

    {{-- date picker  --}}
    <link rel="stylesheet" href="{{ asset('main/gijgo.min.css') }}">

    <title>ICT helpdesk dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="allinone/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="allinone/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="allinone/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="allinone/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="allinone/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="allinone/summernote-bs4.min.css">


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

        .select2 {
            width: 100% !important;
        }
    </style>


    @livewireStyles
</head>

<body class="sidebar-mini layout-fixed layout-navbar-fixed sidebar-expanded">
    <div id="app" class="wrapper">
        <div class="main-header">
            @include('layouts.nav')
        </div>

        @include('layouts.sidebar')

        <main class="content-wrapper p-5">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $totalTicket }}</h3>
                                    <p>Total Tickets</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-ticket-alt"></i>

                                </div>
                                <a href="/tickets" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3> {{ $totalactiveTicket }}</h3>

                                    <p>Active Tickets</p>
                                </div>
                                <div class="icon">
                                    <i class="far fa-check-circle"></i>
                                </div>
                                <a href="/tickets" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{  $todaysTicket }}</h3>

                                    <p>Todays Tickets</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-folder-open"></i>
                                </div>
                                <a href="/todaysTicket" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ $totalClosedTicket  }}</h3>

                                    <p>Closed Tickets</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-exclamation-triangle"></i>

                               </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>

                    <div class="" style="margin-top: 20px;">
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-purple">
                                    <div class="inner">
                                        <h3>{{ $countUsers }}</h3>
                                        <p>Total Users</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <a href="/users" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-teal">
                                    <div class="inner">
                                        <h3> {{ $totalTicket }}</h3>

                                        <p>User Supports</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-headset"></i>
                                    </div>
                                    <a href="/tickets" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-secondary">
                                    <div class="inner">
                                        <h3>{{ $totalpendingTicket }}</h3>

                                        <p>All Report</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-dark">
                                    <div class="inner">
                                        <h3>{{ $totalUnclosedTicket }}</h3>

                                        <p>Unclosed Ticket Reports</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>
                    </div>
                    <!-- /.row -->
                    <!-- Main row -->

                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </main>
    </div>

    @stack('modals')

    @livewireScripts

    @stack('scripts')

    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.min.js') }}" defer></script>
    {{-- datatable js --}}
    <script src="{{ asset('js/datatable/jquery.dataTables.min.js') }}" defer></script>
    <script src="{{ asset('js/datatable/bootstrap4.min.js') }}" defer></script>


    <!-- Select2 -->
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

    <script>
        /* Simple Alpine Image Viewer */
        document.addEventListener('alpine:init', () => {
                Alpine.data('imageViewer', (src = '') => {
                    return {
                        imageUrl: src,

                        refreshUrl() {
                            this.imageUrl = this.$el.getAttribute("image-url")
                        },

                        fileChosen(event) {
                            this.fileToDataUrl(event, src => this.imageUrl = src)
                        },

                        fileToDataUrl(event, callback) {
                            if (!event.target.files.length) return

                            let file = event.target.files[0],
                                reader = new FileReader()

                            reader.readAsDataURL(file)
                            reader.onload = e => callback(e.target.result)
                        },
                    }
                })
            }) <
            script src = "{{ asset('js/login.js') }}" >
    </script>
</body>

<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2({
            // dropdownAutoWidth: true
            // theme: "classic"

        })
    });
</script>

</html>
