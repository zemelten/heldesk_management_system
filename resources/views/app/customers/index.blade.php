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
                @can('create', App\Models\Customer::class)
                <a
                    href="{{ route('customers.create') }}"
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
                <h4 class="card-title">@lang('crud.customers.index_title')</h4>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th class="text-left">
                                @lang('crud.customers.inputs.full_name')
                            </th>
                            <th class="text-left">
                                @lang('crud.customers.inputs.email')
                            </th>
                            <th class="text-left">
                                @lang('crud.customers.inputs.phone_no')
                            </th>
                            <th class="text-left">
                                @lang('crud.customers.inputs.building_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.customers.inputs.campus_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.customers.inputs.organizational_unit_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.customers.inputs.floor_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.customers.inputs.office_num')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($customers as $key => $customer)
                        <tr>
                            <td style="width: 2.5cm"> {{$key+1}}</td>
                            <td>{{ $customer->full_name ?? '-' }}</td>
                            <td>{{ $customer->email ?? '-' }}</td>
                            <td>{{ $customer->phone_no ?? '-' }}</td>
                            <td>
                                {{ optional($customer->building)->name ?? '-' }}
                            </td>
                            <td>
                                {{ optional($customer->campus)->name ?? '-' }}
                            </td>
                            <td>
                                {{ optional($customer->organizationalUnit)->name
                                ?? '-' }}
                            </td>
                            <td>
                                {{ optional($customer->floor)->name ?? '-' }}
                            </td>
                            
                            <td>{{ $customer->office_num ?? '-' }}</td>
                           
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $customer)
                                    <a
                                        href="{{ route('customers.edit', $customer) }}"
                                        class="px-1">
                                        <button type="button" class="btn btn-sm btn-outline-info">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $customer)
                                    <a
                                        href="{{ route('customers.show', $customer) }}"
                                        class="px-1">
                                        <button type="button" class="btn btn-sm btn-outline-info">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $customer)
                                    <form
                                        data-route="{{ route('customers.destroy', $customer) }}"
                                        method="POST"
                                        id="deleteCustomer"
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
                            <td colspan="11">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="11">{!! $customers->render() !!}</td>
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
        $(document).on('submit', '#deleteCustomer', function(e) {
            e.preventDefault();



            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover it.!",
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
                                swal("Customer has been deleted!", {
                                    icon: "success",
                                    button: true,
                                   
                                }).then((ok)=>{
                                    window.location = '/customers'
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