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
                    @can('create', App\Models\TimeSetting::class)
                        <a href="{{ route('time-settings.create') }}" class="btn btn-primary">
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
                        Ticket Time Settings
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-condensed">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th class="text-left">
                                    @lang('crud.floors.inputs.name')
                                </th>
                                <th class="text-left">
                                    Time(in Days)
                                </th>
                                <th class="text-center">
                                    @lang('crud.common.actions')
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($timeSettings as  $key => $value)
                                <tr>
                                    <td>
                                        {{  $key + 1 }}    
                                         
                                          </td>

                                    <td>
                                        {{ $value->name ?? '-' }}
                                    </td>
                                    @if ($value->type == 0)
                                    <td>
                                        {{ $value->time . ' ' . 'days' ?? '-' }}
                                    </td>
                                    @elseif($value->type == 1)

                                    <td>
                                        {{ $value->time . ' ' . 'hours' ?? '-' }}
                                    </td>
                                    @else
                                        <td>
                                            {{ $value->time . ' ' . 'minutes' ?? '-' }}
                                        </td>
                                    @endif

                                    <td class="text-center" style="width: 134px;">
                                        <div role="group" aria-label="Row Actions" class="btn-group">
                                            @can('update', $value)
                                                <a href="{{ route('time-settings.edit', $value) }}"class="px-1">
                                                    <button type="button" class="btn btn-sm btn-outline-info">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </a>
                                                @endcan @can('delete', $value)
                                                <form data-route="{{ route('time-settings.destroy', $value) }}"
                                                    method="POST" id="deletesetting" @csrf @method('DELETE') <button
                                                    type="submit" class="btn btn-sm btn-outline-danger">
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
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).on('submit', '#deletesetting', function(e) {
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
                                swal("Setting has been deleted!", {
                                    icon: "success",
                                    button: true,

                                }).then((ok) => {
                                    window.location = '/time-settings'
                                })

                            }
                        });


                    } else {

                    }
                });
        });
    </script>
@endpush
