@extends('layouts.app')

@section('content')
    <!-- /.card -->
    <div class="searchbar mt-0 mb-4">
    
            <livewire:ticket-filters/>

            
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@lang('crud.tickets.index_title')</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th class="text-left">
                            #
                        </th>
                        <th class="text-left">
                            @lang('crud.tickets.inputs.customer_id')
                        </th>
                        <th class="text-left">
                            Age
                        </th>


                        <th class="text-left">
                            @lang('crud.tickets.inputs.campuse_id')
                        </th>
                        <th class="text-left">
                            Building
                        </th>
                        <th class="text-left">
                            @lang('crud.tickets.inputs.problem_id')
                        </th>
                        <th class="text-left">
                            @lang('crud.tickets.inputs.organizational_unit_id')
                        </th>


                        <th class="text-center">
                            @lang('crud.common.actions')
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tickets as $key => $ticket)
                        <tr>
                            <td>
                                {{ $key + 1 }}

                            </td>
                            <td>
                                {{ optional($ticket->customer)->full_name ?? '-' }}
                            </td>
                            <td>
                                @php $age = Carbon\Carbon::parse($ticket->created_at)->diffForHumans();
                                    $duration = $duration = Carbon\Carbon::parse($ticket->created_at)->diffInHours();
                                    
                                @endphp

                                @if ($duration <= 24)
                                    <span class="badge badge-success">{{ $age }} </span>
                                @elseif($duration > 24 && $duration <= 48)
                                    <span class="badge badge-warning">{{ $age }} </span>
                                @else
                                    <span class="badge badge-danger">{{ $age }} </span>
                                @endif
                                @if ($ticket->status == 0)
                                    <span class="mb-2 badge badge-warning">Active</span>
                                @else
                                    <span class="mb-2 badge badge-danger">Closed</span>
                                @endif
                            </td>



                            <td>
                                {{ optional($ticket->campuse)->name ?? '-' }}
                            </td>
                            <td>
                                @if ($ticket->organizationalUnit != null)
                                    {{ optional($ticket->organizationalUnit->building)->name ?? '-' }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                {{ optional($ticket->problem)->name ?? '-' }}
                            </td>
                            <td>
                                {{ optional($ticket->organizationalUnit)->name ?? '-' }}
                            </td>


                            <td class="text-center" style="width: 134px;">
                                <div role="group" aria-label="Row Actions" class="btn-group">
                                    @can('update', $ticket)
                                        <a href="{{ route('tickets.edit', $ticket) }}" class="px-2">
                                            <button type="button" class="btn btn-sm btn-outline-info">
                                                <i class="fa fa-edit"></i> </button>
                                        </a>
                                        @endcan @can('view', $ticket)
                                        <a href="{{ route('tickets.show', $ticket) }}" class="px-2">
                                            <button type="button" class="btn btn-sm btn-outline-primary">
                                                <i class="fa fa-eye"></i></button>
                                        </a>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    {{-- <tr>
                      <th class="text-left">
                          @lang('crud.tickets.inputs.customer_id')
                      </th>
                      <th class="text-left">
                          Age
                      </th>

                      <th class="text-left">
                          @lang('crud.tickets.inputs.campuse_id')
                      </th>
                      <th class="text-left">
                          Building
                      </th>
                      <th class="text-left">
                          @lang('crud.tickets.inputs.problem_id')
                      </th>
                      <th class="text-left">
                          @lang('crud.tickets.inputs.organizational_unit_id')
                      </th>
                    
                     
                      <th class="text-center">
                          @lang('crud.common.actions')
                      </th>
                  </tr> --}}
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    </div>
@endsection
@push('scripts')
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });
    </script>
@endpush
