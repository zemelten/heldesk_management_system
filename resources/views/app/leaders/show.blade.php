@extends('layouts.app')

@section('content')
<div class="container">
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
                <div class="mb-4">
                    <h5>@lang('crud.leaders.inputs.user_id')</h5>
                    <span>{{ optional($leader->user)->full_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.leaders.inputs.director_id')</h5>
                    <span
                        >{{ optional($leader->director)->full_name ?? '-'
                        }}</span
                    >
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
</div>
@endsection
