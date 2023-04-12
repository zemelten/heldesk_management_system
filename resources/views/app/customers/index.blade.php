@extends('layouts.app')

@section('content')
<div class="container">
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
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
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
                                @lang('crud.customers.inputs.user_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.customers.inputs.office_num')
                            </th>
                            <th class="text-left">
                                @lang('crud.customers.inputs.is_edited')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($customers as $customer)
                        <tr>
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
                            <td>
                                {{ optional($customer->user)->full_name ?? '-'
                                }}
                            </td>
                            <td>{{ $customer->office_num ?? '-' }}</td>
                            <td>{{ $customer->is_edited ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $customer)
                                    <a
                                        href="{{ route('customers.edit', $customer) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $customer)
                                    <a
                                        href="{{ route('customers.show', $customer) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $customer)
                                    <form
                                        action="{{ route('customers.destroy', $customer) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="icon ion-md-trash"></i>
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
