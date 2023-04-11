@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('priorities.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.priorities.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.priorities.inputs.name')</h5>
                    <span>{{ $prioritie->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.priorities.inputs.response')</h5>
                    <span>{{ $prioritie->response ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.priorities.inputs.description')</h5>
                    <span>{{ $prioritie->description ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('priorities.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Prioritie::class)
                <a
                    href="{{ route('priorities.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
