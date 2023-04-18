@extends('layouts.app')

@section('content')
<div class="">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('leaders.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.leaders.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.leaders.inputs.full_name')</h5>
                    <span>{{ $leader->full_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>Belongs to Director</h5>
                    <span>{{ $leader->director->full_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.leaders.inputs.sex')</h5>
                    <span>{{ $leader->sex ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.leaders.inputs.phone')</h5>
                    <span>{{ $leader->phone ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.leaders.inputs.email')</h5>
                    <span>{{ $leader->email ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('leaders.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Leader::class)
                <a href="{{ route('leaders.create') }}" class="btn btn-light">
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

            <livewire:leader-user-supports-detail :leader="$leader" />
        </div>
    </div>
    @endcan
</div>
@endsection
