@extends('layouts.app')

@section('content')
<div class="container">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
                <form>
                    <div class="input-group">
                        <input
                            id="indexSearch"
                            type="text"
                            name="search"
                            placeholder="{{ __('crud.common.search') }}"
                            value="{{ $search ?? '' }}"
                            class="form-control"
                            autocomplete="off"
                        />
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">
                                <i class="icon ion-md-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 text-right">
                @can('create', App\Models\Ticket::class)
                <a href="{{ route('tickets.create') }}" class="btn btn-primary">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('crud.tickets.index_title')</h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.tickets.inputs.status')
                            </th>
                            <th class="text-left">
                                @lang('crud.tickets.inputs.description')
                            </th>
                            <th class="text-left">
                                @lang('crud.tickets.inputs.customer_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.tickets.inputs.campuse_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.tickets.inputs.building_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.tickets.inputs.problem_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.tickets.inputs.organizational_unit_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.tickets.inputs.user_support_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.tickets.inputs.prioritie_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tickets as $ticket)
                        <tr>
                            <td>{{ $ticket->status ?? '-' }}</td>
                            <td>{{ $ticket->description ?? '-' }}</td>
                            <td>
                                {{ optional($ticket->user)->full_name ?? '-' }}
                            </td>
                            <td>
                                {{ optional($ticket->campuse)->name ?? '-' }}
                            </td>
                            <td>
                                {{ optional($ticket->building)->name ?? '-' }}
                            </td>
                            <td>
                                {{ optional($ticket->problem)->name ?? '-' }}
                            </td>
                            <td>
                                {{ optional($ticket->organizationalUnit)->name
                                ?? '-' }}
                            </td>
                            <td>
                                {{ optional($ticket->userSupport)->id ?? '-' }}
                            </td>
                            <td>
                                {{ optional($ticket->prioritie)->name ?? '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $ticket)
                                    <a
                                        href="{{ route('tickets.edit', $ticket) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $ticket)
                                    <a
                                        href="{{ route('tickets.show', $ticket) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $ticket)
                                    <form
                                        action="{{ route('tickets.destroy', $ticket) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="10">{!! $tickets->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
