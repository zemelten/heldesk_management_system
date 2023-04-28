@extends('layouts.app')

@section('content')
<div class="">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('time-settings.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
               
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.floors.inputs.name')</h5>
                    <span>{{ $timeSetting->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.floors.inputs.description')</h5>
                    <span>{{ $timeSetting->time ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('time-settings.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\TimeSetting::class)
                <a href="{{ route('time-settings.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
