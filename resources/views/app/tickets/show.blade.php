@extends('layouts.app')

@section('content')
<div class="">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('tickets.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.tickets.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.tickets.inputs.status')</h5>
                    <span>{{ $ticket->status ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.tickets.inputs.description')</h5>
                    <span>{{ $ticket->description ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.tickets.inputs.campuse_id')</h5>
                    <span>{{ optional($ticket->campuse)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.tickets.inputs.customer_id')</h5>
                    <span
                        >{{ optional($ticket->customer)->full_name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.tickets.inputs.problem_id')</h5>
                    <span>{{ optional($ticket->problem)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.tickets.inputs.organizational_unit_id')</h5>
                    <span
                        >{{ optional($ticket->organizationalUnit)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.tickets.inputs.user_support_id')</h5>
                    <span>{{ optional($ticket->userSupport)->id ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.tickets.inputs.prioritie_id')</h5>
                    <span>{{ optional($ticket->prioritie)->name ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('tickets.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Ticket::class)
                <a href="{{ route('tickets.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
