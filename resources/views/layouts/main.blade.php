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

    <!-- CHARTS -->


    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">


    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">


    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/pace-progress/themes/black/pace-theme-minimal.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}css/tooltipster.bundle.min.css" />





    <!-- CHARTS -->
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

<body class="hold-transition sidebar-mini layout-fixed">
    <div id="app" class="wrapper">
        <div class="main-header">
            @include('layouts.nav')
        </div>

        @include('layouts.sidebar')

        <main class="content-wrapper p-5">

            @if (Auth::user()->roles()->first() != null &&
                    Auth::user()->roles()->first()->name === 'customer')
                @can('view-any', App\Models\Ticket::class)
                    <div class="card mt-4">
                        <div class="card-body">
                            <h4 class="card-title w-100 mb-2">Your Tickets</h4>

                            <livewire:customer-tickets-detail :customer="$customer" />
                        </div>
                    </div>
                @endcan
            
            @elseif (Auth::user()->roles()->first() != null &&
            Auth::user()->roles()->first()->name === 'user')
        @can('view-any', App\Models\Ticket::class)
            <div class="card mt-4">
                <div class="card-body">
                    <h4 class="card-title w-100 mb-2">Contact Your Administrator</h4>

                   
                </div>
            </div>
        @endcan


            @elseif (Auth::user()->roles()->first() != null &&
                    Auth::user()->roles()->first()->name === 'user-support')
                @can('view-any', App\Models\Ticket::class)
                    <div class="card mt-4">
                        <div class="card-body">
                            <h4 class="card-title w-100 mb-2">Today's Tickets</h4>
                            

                            <livewire:user-support-tickets-detail :userSupport="$userSupport" />
                        
                        </div>
                    </div>
                @endcan
            @else
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
                                        <h3>{{ $todaysTicket }}</h3>

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
                                        <h3>{{ $totalClosedTicket }}</h3>

                                        <p>Closed Tickets</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa-solid fa-check"></i>

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
                                            <h3> {{ $countUsersupports }}</h3>

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

                <div class="col-md-12">
                    <div class="card " id="mycard">
                        <div class="card-header">
                            <h5 class="card-title">Tickets and Customers Diagram</h5>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-tool dropdown-toggle"
                                        data-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-wrench"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" id="save">
                                        <i class="fas  fa-save"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" role="menu" style="">
                                        <button class="dropdown-item changeDiagram" data-value="pie"
                                            data-cut="0">Pie</button>
                                        <button class="dropdown-item changeDiagram" data-value="doughnut"
                                            data-cut="50">Doughnut</button>
                                        <button class="dropdown-item changeDiagram" data-value="bar"
                                            data-cut="0">Bar</button>


                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="display: block;">
                            <div class="row">

                                <div class="col-md-12">
                                    <p class="text-center">

                                        <strong>
                                            <script>
                                                document.write(new Date().toLocaleDateString('en-US', {
                                                    year: 'numeric',
                                                    month: 'long',
                                                    day: 'numeric'
                                                }))
                                            </script>
                                        </strong>
                                    </p>
                                </div>

                                <div class="col-md-6">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="AllCafe" style="display: block; width: 305px; height: 152px;"
                                        width="610" height="304" class="chartjs-render-monitor"></canvas>
                                    <a data-id="AllCafe" download="ChartImage.jpg" href=""
                                        class=" download float-right bg-flat-color-1">
                                        <i class="fa fa-download"></i>
                                    </a>
                                </div>


                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="AllMealType" width="610" height="304"
                                        style="display: block; width: 305px; height: 152px;"
                                        class="chartjs-render-monitor"></canvas>
                                    <a data-id="AllMealType" download="ChartImage.jpg" href=""
                                        class=" download float-right bg-flat-color-1">
                                        <i class="fa fa-download"></i>
                                    </a>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- ./card-body -->
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
            @endif
            <!-- Main content -->
            <!-- /.content -->
        </main>
        @include('layouts.footer')
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
            /body>

            <
            script >
            $(function() {
                //Initialize Select2 Elements
                $('.select2').select2({
                    // dropdownAutoWidth: true
                    // theme: "classic"

                })
            });
    </script>

    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>

    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>


    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/pace-progress/pace.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>


    <script>
        function toastAll() {

        }

        setTimeout(function() {

        }, 1000);
    </script>
    <script>
        $(document).ready(function() {


            $(".nav-sidebar").find(".active").removeClass("active");

            var path = document.location.protocol + "//" + document.location.hostname + document.location.pathname;
            $('.nav-item a').each(function() {
                if (this.href === path) {
                    $(this).addClass('active');
                    $(this).closest('.has-treeview').addClass('menu-open');
                }
            });

        })

        $('#language').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var url = form.attr('action');


            $.ajax({
                type: "POST",
                url: form.attr('action'),
                data: form.serialize(),
                success: function(response) {

                    location.reload();
                }
            })

        });
        $('#lang').change(function() {
            $('#language').submit();
        })
    </script>
    <script>
        function toastIt(context, msg, pos) {
            toastr.options.timeOut = "3000";
            toastr.options.progressBar = true;
            toastr.options.closeButton = true;
            toastr.options.positionClass = 'toast-bottom-right';
            toastr['info']('Success');

            // $('.btn-toastr').on('click', function() {
            if (context == "danger")
                context = "error"





            $context = context;
            $message = msg;
            $position = pos;

            if ($context === '') {
                $context = 'info';
            }

            if ($position === '') {
                $positionClass = 'toast-top-right';
            } else {
                $positionClass = 'toast-' + $position;
            }

            toastr.remove();
            toastr[$context]($message, '', {
                positionClass: $positionClass
            });
            // });
        }
    </script>
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <script>
        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
        var diagramType = 'pie'
        var active = {{ Js::from($totalactiveTicket) }}
        var closed = {{ Js::from($totalClosedTicket) }}
        var active = {{ Js::from($totalactiveTicket) }}
        var AllTicketConfig = {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [active, closed, closed, active],

                    backgroundColor: [getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), ],
                    label: 'Tickets '
                }],
                labels: ["Active", "Closed", "Responded", "Escalated"]
            },
            options: {
                responsive: true,
                legend: {
                    position: 'top'
                },
                title: {
                    display: true,
                    text: 'All Ticket Types'
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            }
        };
        var AllUserSuppConfig = {
            type: diagramType,
            data: {
                datasets: [{
                    data: [6516, 3533, 1097],

                    backgroundColor: [getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), ],
                    label: 'User Supports '
                }],
                labels: ["Technian", "Sys Admin", "Network"]
            },
            options: {
                responsive: true,
                legend: {
                    position: 'top'
                },
                title: {
                    display: true,
                    text: 'All User Supports'
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            }
        };


        var AllMealType;
        var AllMealTypectx = document.getElementById('AllMealType').getContext('2d');
        var AllCafe;
        var AllCafectx = document.getElementById('AllCafe').getContext('2d');;

        window.onload = function() {

            AllCafe = new Chart(AllCafectx, AllTicketConfig);

            AllMealType = new Chart(AllMealTypectx, AllUserSuppConfig);
        };
        $(document).ready(function() {
            $('.changeDiagram').click(function() {
                var diagram = $(this).attr('data-value');
                var cutoutPercentage = $(this).attr('data-cut');

                if (AllMealType) {
                    AllMealType.destroy();
                }
                var temp = jQuery.extend(true, {}, AllUserSuppConfig);
                temp.type = diagram;
                temp.options.cutoutPercentage = cutoutPercentage;
                AllMealType = new Chart(AllMealTypectx, temp);
                if (AllCafe) {
                    AllCafe.destroy();
                }
                console.log(temp);
                var temp = jQuery.extend(true, {}, AllTicketConfig);
                temp.type = diagram;
                temp.options.cutoutPercentage = cutoutPercentage;

                AllCafe = new Chart(AllCafectx, temp);


            })
        })
    </script>
    <script>
        $(function() { // Initialize Select2 Elements
            $('.select2').select2({
                theme: 'bootstrap4'
            });

            $('.dateRange').daterangepicker();

        });

        $('.download').click(function(e) {
            var url_base64jp = document.getElementById($(this).attr('data-id')).toDataURL("image/jpg");
            $(this).attr('href', url_base64jp);
        });
    </script>

</html>
