@extends('layouts.app')

@section('content')
    <div class="">
        <div class="searchbar mt-0 mb-4">
            <div class="row">
                <div class="col-md-6">
                    <form>
                        <div class="input-group">
                            <input id="indexSearch" type="text" name="search" placeholder="{{ __('crud.common.search') }}"
                                value="{{ $search ?? '' }}" class="form-control" autocomplete="off" />
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">
                                    <i class="icon ion-md-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 text-right">
                    @can('create', App\Models\UserSupport::class)
                        <a href="{{ route('user-supports.create') }}" class="btn btn-primary">
                            <i class="icon ion-md-add"></i> @lang('crud.common.create')
                        </a>
                    @endcan
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div style="display: flex; justify-content: space-between;">
                    <h4 class="card-title">
                        @lang('crud.user_supports.index_title')
                    </h4>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-condensed">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th class="text-left">
                                    @lang('crud.user_supports.inputs.user_id')
                                </th>
                                <th class="text-left">
                                    @lang('crud.user_supports.inputs.problem_catagory_id')
                                </th>



                                <th class="text-left">
                                    @lang('crud.user_supports.inputs.building_id')
                                </th>
                                <th class="text-left">
                                    @lang('crud.user_supports.inputs.service_unit_id')
                                </th>
                                <th class="text-left">
                                    Tickets
                                </th>
                                <th class="text-center">
                                    @lang('crud.common.actions')
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($userSupports as $key => $userSupport)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        {{ optional($userSupport->user)->full_name ?? '-' }}
                                    </td>


                                    <td>
                                        {{ optional($userSupport->problemCatagory)->name ?? '-' }}
                                    </td>

                                    <td>
                                        {{ optional($userSupport->building)->name ?? '-' }}
                                    </td>
                                    <td>
                                        {{ optional($userSupport->serviceUnit)->name ?? '-' }}
                                    </td>

                                    @if ($userSupport->tickets()->count() == 0)
                                        <td>
                                            No tickets
                                        </td>
                                    @else
                                        <td>
                                            {{ $userSupport->tickets()->count() }} tickets
                                        </td>
                                    @endif

                                    <td class="text-center" style="width: 134px;">
                                        <div role="group" aria-label="Row Actions" class="btn-group">
                                            @can('update', $userSupport)
                                                <a href="{{ route('user-supports.edit', $userSupport) }}" class="px-1">
                                                    <button type="button" class="btn btn-sm btn-outline-info">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </a>
                                                @endcan @can('view', $userSupport)
                                                <a href="{{ route('user-supports.show', $userSupport) }}" class="px-1">
                                                    <button type="button" class="btn btn-sm btn-outline-info">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </a>
                                                @endcan @can('delete', $userSupport)
                                                <form data-route="{{ route('user-supports.destroy', $userSupport) }}"
                                                    method="POST" id="deleteSupport">
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
                                    <td>
                                        @lang('crud.common.no_items_found')
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>{!! $userSupports->render() !!}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).on('submit', '#deleteSupport', function(e) {
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
                                swal("Support has been deleted!", {
                                    icon: "success",
                                    button: true,

                                }).then((ok) => {
                                    window.location = '/user-supports'
                                })

                            }
                        });


                    } else {

                    }
                });
        });
    </script>
@endpush
