@extends('layouts.main')

@section('content')
    <?php
    // Get the total number of users from the database
    $totalUsers = DB::table('users')->count();
    ?>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">

                
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <strong>Copyright &copy; 2022-2023 <a href="https://www.ju.edu.et">Jimma University</a>.</strong>
                All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 3.2.0
                </div>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="allinone/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="allinone/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="allinone/bootstrap.bundle.min.js"></script>
        <!-- ChartJS -->
        <script src="allinone/Chart.min.js"></script>
        <!-- Sparkline -->
        <script src="allinone/sparkline.js"></script>
        <!-- JQVMap -->
        <script src="allinone/jquery.vmap.min.js"></script>
        <script src="allinone/jquery.vmap.usa.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="allinone/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="allinone/moment.min.js"></script>
        <script src="allinone/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="allinone/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="allinone/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="allinone/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="allinone/adminlte.js"></script>
        <!-- Code injected by live-server -->
        <script>
            // <![CDATA[  <-- For SVG support
            if ('WebSocket' in window) {
                (function() {
                    function refreshCSS() {
                        var sheets = [].slice.call(document.getElementsByTagName("link"));
                        var head = document.getElementsByTagName("head")[0];
                        for (var i = 0; i < sheets.length; ++i) {
                            var elem = sheets[i];
                            var parent = elem.parentElement || head;
                            parent.removeChild(elem);
                            var rel = elem.rel;
                            if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() ==
                                "stylesheet") {
                                var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
                                elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date()
                                    .valueOf());
                            }
                            parent.appendChild(elem);
                        }
                    }
                    var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
                    var address = protocol + window.location.host + window.location.pathname + '/ws';
                    var socket = new WebSocket(address);
                    socket.onmessage = function(msg) {
                        if (msg.data == 'reload') window.location.reload();
                        else if (msg.data == 'refreshcss') refreshCSS();
                    };
                    if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
                        console.log('Live reload enabled.');
                        sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
                    }
                })();
            } else {
                console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
            }
            // ]]>
        </script>
    </body>

    </html>
@endsection

@push('scripts')
    <script>
        $('#building_id').on('change', function() {
            var idState = this.value;
            $("#organizational_unit_id").html('');
            $.ajax({
                url: "{{ url('/get-org-units') }}",
                type: "POST",
                data: {
                    building_id: idState,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(res) {
                    $('#organizational_unit_id').html(
                    '<option value="">-- Select Org Unit --</option>');
                    $.each(res.orgs, function(key, value) {
                        $("#organizational_unit_id").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });

        $('#campuse_id').on('change', function() {
            var idState = this.value;
            $("#building_id").html('');
            $.ajax({
                url: "{{ url('/get-buildings') }}",
                type: "POST",
                data: {
                    campuse_id: idState,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(res) {
                    $('#building_id').html('<option value="">-- Select Building --</option>');
                    $.each(res.blds, function(key, value) {
                        $("#building_id").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    </script>
@endpush
