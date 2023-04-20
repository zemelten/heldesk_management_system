@extends('layouts.app')

@section('content')
    <div class="">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    <a href="{{ route('all-reports.index') }}" class="mr-4"><i class="icon ion-md-arrow-back"></i></a>
                    @lang('crud.all_reports.show_title')
                </h4>

            </div>
        </div>

        @can('view-any', App\Models\Ticket::class)
            <div class="card mt-4">
                <div class="card-body">
                    <h4 class="card-title w-100 mb-2">Report</h4>
                    <div class="mb-4">
                        <h5>@lang('crud.user_supports.inputs.user_id')</h5>
                        <span>{{ optional($reports->user)->full_name ?? '-' }}</span>
                    </div>
                </div>



            </div>
        </div>
    @endcan
    <div class="container-fluid">
        <h5 class="mb-2">Info Box</h5>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Tickets </span>
                        <span class="info-box-number">{{ $totalTicket }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Active Tickets</span>
                        <span class="info-box-number">{{ $totalactiveTicket }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Escaleted Tickets</span>
                        <span class="info-box-number">{{ $todaysTicket }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Closed TIckets</span>
                        <span class="info-box-number">{{ $totalClosedTicket }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->



        <script type="text/javascript">
            $(function() {

                var start = moment().subtract(29, 'days');
                var end = moment();

                function cb(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }

                $('#reportrange').daterangepicker({
                    startDate: start,
                    endDate: end,
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                            'month').endOf('month')],
                        'This Year': [moment().startOf('year'), moment().endOf('year')]
                    }
                }, cb);

                cb(start, end);

            });
        </script>

        <div id="reportrange" class="pull-left col-6"
            style="background: #fff; cursor: pointer; padding: 10px 20px; border: 1px solid #ccc; width: 100%">
            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
            <span id="dateRange"></span> <b class="caret"></b>

            <script>
                var dateRange = document.getElementById('dateRange');
                

            </script>
            <input type="hidden" id="" 
            
            
            />
        </div>






        <!-- /.col -->
    </div>
    <!-- /.row -->





    </div>
    </div>
@endsection
