@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('user-supports.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.user_supports.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.user_supports.inputs.user_id')</h5>
                    <span
                        >{{ optional($userSupport->user)->full_name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.user_supports.inputs.user_type')</h5>
                    <span>{{ $userSupport->user_type ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.user_supports.inputs.problem_catagory_id')
                    </h5>
                    <span
                        >{{ optional($userSupport->problemCatagory)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.user_supports.inputs.building_id')</h5>
                    <span
                        >{{ optional($userSupport->building)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.user_supports.inputs.service_unit_id')</h5>
                    <span
                        >{{ optional($userSupport->serviceUnit)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.user_supports.inputs.unit_id')</h5>
                    <span
                        >{{ optional($userSupport->unit)->telephone ?? '-'
                        }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('user-supports.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\UserSupport::class)
                <a
                    href="{{ route('user-supports.create') }}"
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

            <livewire:user-support-tickets-detail :userSupport="$userSupport" />
        </div>
    </div>
    @endcan @can('view-any', App\Models\EscalatedTicket::class)
    <div class="card mt-4">
        <div class="card-body">
            <h4 class="card-title w-100 mb-2">Escalated Tickets</h4>

            <livewire:user-support-escalated-tickets-detail
                :userSupport="$userSupport"
            />
        </div>
    </div>
    @endcan
</div>
@endsection
