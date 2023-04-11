@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('customers.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.customers.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.customers.inputs.full_name')</h5>
                    <span>{{ $customer->full_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.customers.inputs.email')</h5>
                    <span>{{ $customer->email ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.customers.inputs.phone_number')</h5>
                    <span>{{ $customer->phone_number ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.customers.inputs.building_id')</h5>
                    <span
                        >{{ optional($customer->building)->name ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.customers.inputs.campus_id')</h5>
                    <span>{{ optional($customer->campus)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.customers.inputs.organizational_unit_id')
                    </h5>
                    <span
                        >{{ optional($customer->organizationalUnit)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.customers.inputs.floor_id')</h5>
                    <span>{{ optional($customer->floor)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.customers.inputs.user_id')</h5>
                    <span
                        >{{ optional($customer->user)->full_name ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.customers.inputs.is_edited')</h5>
                    <span>{{ $customer->is_edited ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.customers.inputs.office_num')</h5>
                    <span>{{ $customer->office_num ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('customers.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Customer::class)
                <a href="{{ route('customers.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
