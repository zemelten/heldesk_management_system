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
                @can('create', App\Models\Leader::class)
                <a href="{{ route('leaders.create') }}" class="btn btn-primary">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('crud.leaders.index_title')</h4>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th class="text-left">
                                @lang('crud.leaders.inputs.full_name')
                            </th>
                            <th class="text-left">
                                @lang('crud.leaders.inputs.sex')
                            </th>
                            <th class="text-left">
                                @lang('crud.leaders.inputs.phone')
                            </th>
                            <th class="text-left">
                                @lang('crud.leaders.inputs.email')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($leaders as $key => $leader)
                        <tr>
                            <td style="width: 2.5cm"> {{$key+1}}</td>
                            <td>{{ $leader->full_name ?? '-' }}</td>
                            <td>{{ $leader->sex ?? '-' }}</td>
                            <td>{{ $leader->phone ?? '-' }}</td>
                            <td>{{ $leader->email ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $leader)
                                    <a
                                        href="{{ route('leaders.edit', $leader) }}"
                                        class="px-1">
                                        <button type="button" class="btn btn-sm btn-outline-info">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $leader)
                                    <a
                                        href="{{ route('leaders.show', $leader) }}"
                                        class="px-1">
                                        <button type="button" class="btn btn-sm btn-outline-info">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $leader)
                                    <form
                                        data-route="{{ route('leaders.destroy', $leader) }}"
                                        method="POST"
                                        id="deleteLeader"
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
                            <td colspan="5">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5">{!! $leaders->render() !!}</td>
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
        $(document).on('submit', '#deleteLeader', function(e) {
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
                                swal("Leader has been deleted!", {
                                    icon: "success",
                                    button: true,
                                   
                                }).then((ok)=>{
                                    window.location = '/leaders'
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
