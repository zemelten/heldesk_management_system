@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('units.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.units.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.units.inputs.telephone')</h5>
                    <span>{{ $unit->telephone ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.units.inputs.fax')</h5>
                    <span>{{ $unit->fax ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.units.inputs.email')</h5>
                    <span>{{ $unit->email ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.units.inputs.campuse_id')</h5>
                    <span>{{ optional($unit->campuse)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.units.inputs.director_id')</h5>
                    <span
                        >{{ optional($unit->director)->full_name ?? '-' }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('units.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Unit::class)
                <a href="{{ route('units.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    @can('view-any', App\Models\ServiceUnit::class)
    <div class="card mt-4">
        <div class="card-body">
            <h4 class="card-title w-100 mb-2">Service Units</h4>

            <livewire:unit-service-units-detail :unit="$unit" />
        </div>
    </div>
    @endcan
</div>
@endsection
