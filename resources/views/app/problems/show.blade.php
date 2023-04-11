@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('problems.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.problems.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.problems.inputs.name')</h5>
                    <span>{{ $problem->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.problems.inputs.description')</h5>
                    <span>{{ $problem->description ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.problems.inputs.problem_catagory_id')</h5>
                    <span
                        >{{ optional($problem->problemCatagory)->name ?? '-'
                        }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('problems.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Problem::class)
                <a href="{{ route('problems.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
