@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('directors.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.directors.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.directors.inputs.full_name')</h5>
                    <span>{{ $director->full_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.directors.inputs.user_id')</h5>
                    <span
                        >{{ optional($director->user)->full_name ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.directors.inputs.sex')</h5>
                    <span>{{ $director->sex ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.directors.inputs.email')</h5>
                    <span>{{ $director->email ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.directors.inputs.phone')</h5>
                    <span>{{ $director->phone ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('directors.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Director::class)
                <a href="{{ route('directors.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
