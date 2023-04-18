@extends('layouts.app')

@section('content')
<div class="">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('escalated-tickets.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.escalated_tickets.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.escalated_tickets.inputs.ticket_id')</h5>
                    <span
                        >{{ optional($escalatedTicket->ticket)->description ??
                        '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.escalated_tickets.inputs.user_support_id')
                    </h5>
                    <span
                        >{{ optional($escalatedTicket->userSupport)->id ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.escalated_tickets.inputs.queue_type_id')
                    </h5>
                    <span
                        >{{ optional($escalatedTicket->queueType)->queue_name ??
                        '-' }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('escalated-tickets.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\EscalatedTicket::class)
                <a
                    href="{{ route('escalated-tickets.create') }}"
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
