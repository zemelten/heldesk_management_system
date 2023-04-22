@extends('layouts.app')

@section('content')
<div class="">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('buildings.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.buildings.edit_title')
            </h4>

            <x-form
                method="PUT"
                action="{{ route('buildings.update', $building) }}"
                class="mt-4"
            >
                @include('app.buildings.form-inputs')

                <div class="mt-4">
                    <a
                        href="{{ route('buildings.index') }}"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-return-left text-primary"></i>
                        @lang('crud.common.back')
                    </a>

                    <a
                        href="{{ route('buildings.create') }}"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-add text-primary"></i>
                        @lang('crud.common.create')
                    </a>

                    <button type="submit" class="btn btn-primary float-right">
                        <i class="icon ion-md-save"></i>
                        @lang('crud.common.update')
                    </button>
                </div>
            </x-form>
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
