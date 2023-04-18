@extends('layouts.app')

@section('content')
<div class="">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('service-units.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.service_units.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.service_units.inputs.name')</h5>
                    <span>{{ $serviceUnit->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.service_units.inputs.telephone')</h5>
                    <span>{{ $serviceUnit->telephone ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.service_units.inputs.fax')</h5>
                    <span>{{ $serviceUnit->fax ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.service_units.inputs.email')</h5>
                    <span>{{ $serviceUnit->email ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.service_units.inputs.discription')</h5>
                    <span>{{ $serviceUnit->discription ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.service_units.inputs.leader_id')</h5>
                    <span
                        >{{ optional($serviceUnit->leader)->full_name ?? '-'
                        }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('service-units.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\ServiceUnit::class)
                <a
                    href="{{ route('service-units.create') }}"
                    class="btn btn-light"
                >
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

            <livewire:service-unit-user-supports-detail
                :serviceUnit="$serviceUnit"
            />
        </div>
    </div>
    @endcan
</div>
@endsection
