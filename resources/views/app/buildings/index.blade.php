@extends('layouts.app')

@section('content')
<div class="">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
                <form>
                    <div class="input-group">
                        <input
                            id="indexSearch"
                            type="text"
                            name="search"
                            placeholder="{{ __('crud.common.search') }}"
                            value="{{ $search ?? '' }}"
                            class="form-control"
                            autocomplete="off"
                        />
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">
                                <i class="icon ion-md-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 text-right">
                @can('create', App\Models\Building::class)
                <a
                    href="{{ route('buildings.create') }}"
                    class="btn btn-primary"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('crud.buildings.index_title')</h4>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-condensed" id="buildings">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th class="text-left">
                                @lang('crud.buildings.inputs.name')
                            </th>
                            <th class="text-left">
                                @lang('crud.buildings.inputs.campuse_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($buildings as $key => $building)
                        <tr>
                            <td style="width: 2.5cm"> {{$key+1}}</td>
                            <td>{{ $building->name ?? '-' }}</td>
                            <td>
                                {{ optional($building->campuse)->name ?? '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $building)
                                    <a
                                        href="{{ route('buildings.edit', $building) }}"
                                        class="px-1">
                                        <button type="button" class="btn btn-sm btn-outline-info">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $building)
                                    <a
                                        href="{{ route('buildings.show', $building) }}"
                                        class="px-1">
                                        <button type="button" class="btn btn-sm btn-outline-info">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $building)
                                    <form
                                        data-route="{{ route('buildings.destroy', $building) }}"
                                        method="POST"
                                        id="deletebld"
                                           >
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3">{!! $buildings->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
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
  $(function () {
    $("#buildings").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": [ "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    
  });
</script>
    <script>
        $(document).on('submit', '#deletebld', function(e) {
            e.preventDefault();



            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover it.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: 'post',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },

                            url: $(this).data('route'),
                            data: {
                                '_method': 'delete'
                            },
                            success: function(response) {
                                swal("Building has been deleted!", {
                                    icon: "success",
                                    button: true,
                                   
                                }).then((ok)=>{
                                    window.location = '/buildings'
                                })
                               
                            }
                        });
                        

                    }
                   
                    else {
                       
                    }
                });
        });
    </script>

@endpush