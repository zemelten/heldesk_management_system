<div class="row">
   
    <div class="col-md-6">
        <form>
            <div class="input-group">
                <div class="input-group-append">

                </div>
            </div>
        </form>
        <form class="form-inline mt-3">
            @csrf

         

            <div class="form-group mr-2">
                <x-inputs.select name="status" id="status" class="form-control">
                    <option value="">All tickets</option>
                    <option value="0">Active tickets</option>
                    <option value="2">Escalated tickets</option>
                    <option value="1">Closed tickets</option>
                </x-inputs.select>
            </div>
            <div class="form-group mr-2 ">
                <x-inputs.select name="user_support_id" id="user_support_id" class="form-control">
                    <option value="">Filter By User Support</option>
                    @foreach ($userSupports as $userSupport)
                        <option value="{{ $userSupport->id }}">
                            {{ $userSupport->user->full_name }}</option>
                          
                    @endforeach
                </x-inputs.select>

            </div>
            <div class="form-group col-5
                ">
                <script type="text/javascript">
                    $(function() {
                        var start = moment().subtract(29, 'days');
                        var end = moment();
                        console.log

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

                <div id="reportrange" class="pull-left col-12"
                    style="background: #fff; cursor: pointer; padding: 10px 20px; border: 1px solid #ccc; width: 100%">
                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                    <span id="dateRange"></span> <b class="caret"></b>

                    <script>
                        var dateRange = document.getElementById('dateRange');
                    </script>
                    <input type="hidden" id="" />
                </div>
            </div>
           



        </form>
    </div>
    <div class="col-md-6 text-right">
        @can('create', App\Models\Ticket::class)
            <a href="{{ route('tickets.create') }}" class="btn btn-primary">
                <i class="fas fa-plus fa-lg"></i> @lang('crud.common.create')
            </a>
        @endcan
    </div>
</div>

