@extends('layouts.app')

@section('content')
<div class="">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('organizational-units.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.organizational_units.edit_title')
            </h4>

            <x-form
                method="PUT"
                action="{{ route('organizational-units.update', $organizationalUnit) }}"
                class="mt-4"
            >
                @include('app.organizational_units.form-inputs')

                <div class="mt-4">
                    <a
                        href="{{ route('organizational-units.index') }}"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-return-left text-primary"></i>
                        @lang('crud.common.back')
                    </a>

                    <a
                        href="{{ route('organizational-units.create') }}"
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

    @can('view-any', App\Models\Customer::class)
    <div class="card mt-4">
        <div class="card-body">
            <h4 class="card-title w-100 mb-2">Customers</h4>

            <livewire:organizational-unit-customers-detail
                :organizationalUnit="$organizationalUnit"
            />
        </div>
    </div>
    @endcan @can('view-any', App\Models\Ticket::class)
    <div class="card mt-4">
        <div class="card-body">
            <h4 class="card-title w-100 mb-2">Tickets</h4>

            <livewire:organizational-unit-tickets-detail
                :organizationalUnit="$organizationalUnit"
            />
        </div>
    </div>
    @endcan
</div>
@endsection
