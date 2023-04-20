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
                      <span
                          >{{ optional($reports->user)->full_name ?? '-'
                          }}</span
                      >
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



            <script>
                $(function() {
                    let today = new Date();
                    let year = today.getFullYear();
                    let month = (today.getMonth() + 1).toString().padStart(2, '0');
                    let day = today.getDate().toString().padStart(2, '0');
                    let formattedDate = `${year}.${month}.${day}`;
                    //console.log(formattedDate);
                    $("#slider-range").slider({
                        range: true,
                        min: new Date('2023.01.01').getTime() / 1000,
                        max: new Date(formattedDate).getTime() / 1000,
                        step: 86400,
                        // values: [new Date('2013.01.01').getTime() / 1000, new Date('2013.02.01').getTime() / 1000],
                        slide: function(event, ui) {
                            $("#amount").val((new Date(ui.values[0] * 1000).toDateString()) + " - " + (new Date(
                                ui.values[1] * 1000)).toDateString());
                        }
                    });
                    $("#amount").val((new Date($("#slider-range").slider("values", 0) * 1000).toDateString()) +
                        " - " + (new Date($("#slider-range").slider("values", 1) * 1000)).toDateString());
                });
            </script>

            <p>
                <label for="amount">Date range:</label>
                <input type="text" id="amount" style="border: 0; color: #f6931f; font-weight: bold;" size="100" />
            </p>
            <div id="slider-range"></div>






            <!-- /.col -->
        </div>
        <!-- /.row -->





    </div>
    </div>
@endsection
