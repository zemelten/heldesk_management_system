@extends('layouts.app')

@section('content')
<div class="">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('all-reports.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.all_reports.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.all_reports.inputs.user_support_id')</h5>
                    <span
                        >{{ optional($reports->userSupport)->id ?? '-' }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('all-reports.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Reports::class)
                <a
                    href="{{ route('all-reports.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    @can('view-any', App\Models\Ticket::class)
    <div class="card mt-4">
        <div class="card-body">
            <h4 class="card-title w-100 mb-2">Tickets</h4>

            <livewire:reports-tickets-detail :reports="$reports" />
        </div>
    </div>
    @endcan
</div>
@endsection
