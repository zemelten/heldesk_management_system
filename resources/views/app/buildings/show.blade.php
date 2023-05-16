@extends('layouts.app')

@section('content')
<div class="">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('buildings.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.buildings.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.buildings.inputs.name')</h5>
                    <span>{{ $building->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.buildings.inputs.campuse_id')</h5>
                    <span>{{ optional($building->campuse)->name ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('buildings.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Building::class)
                <a href="{{ route('buildings.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    @can('view-any', App\Models\UserSupport::class)
    <div class="card mt-4">
        <div class="card-body">
            <h4 class="card-title w-100 mb-2">User Supports</h4>

            <livewire:building-user-supports-detail :building="$building" />
        </div>
    </div>
    @endcan @can('view-any', App\Models\Customer::class)
    <div class="card mt-4">
        <div class="card-body">
            <h4 class="card-title w-100 mb-2">Customers</h4>

            <livewire:building-customers-detail :building="$building" />
        </div>
    </div>
    @endcan @can('view-any', App\Models\OrganizationalUnit::class)
    <div class="card mt-4">
        <div class="card-body">
            <h4 class="card-title w-100 mb-2">Organizational Units</h4>

            <livewire:building-organizational-units-detail
                :building="$building"
            />
        </div>
    </div>
    @endcan
</div>
@endsection
