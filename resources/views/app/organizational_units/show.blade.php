@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('organizational-units.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.organizational_units.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.organizational_units.inputs.name')</h5>
                    <span>{{ $organizationalUnit->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.organizational_units.inputs.offcie_no')</h5>
                    <span>{{ $organizationalUnit->offcie_no ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.organizational_units.inputs.campuse_id')
                    </h5>
                    <span
                        >{{ optional($organizationalUnit->campuse)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.organizational_units.inputs.building_id')
                    </h5>
                    <span
                        >{{ optional($organizationalUnit->building)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.organizational_units.inputs.prioritie_id')
                    </h5>
                    <span
                        >{{ optional($organizationalUnit->prioritie)->name ??
                        '-' }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('organizational-units.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\OrganizationalUnit::class)
                <a
                    href="{{ route('organizational-units.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    @can('view-any', App\Models\Customer::class)
    <div class="card mt-4">
        <div class="card-body">
            <h4 class="card-title w-100 mb-2">Customers</h4>

            <livewire:organizational-unit-customers-detail
                :organizationalUnit="$organizationalUnit"
            />
        </div>
    </div>
    @endcan
</div>
@endsection
