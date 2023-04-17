@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="searchbar mt-0 mb-4">
            <div class="row">
                <div class="col-md-6">
                    <form>
                        <div class="input-group">
                            <input id="indexSearch" type="text" name="search" placeholder="{{ __('crud.common.search') }}"
                                value="{{ $search ?? '' }}" class="form-control" autocomplete="off" />
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 text-right">
                    @can('create', App\Models\Ticket::class)
                        <a href="{{ route('tickets.create') }}" class="btn btn-primary">
                            <i class="fa-solid fa-plus fa-lg" style="color: #ffffff;"></i> @lang('crud.common.create')
                        </a>
                    @endcan
                </div>
            </div>
        </div>


    </div>

    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('crud.tickets.index_title')</h4>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>

                            {{-- <th class="text-left">
                                @lang('crud.tickets.inputs.description')
                            </th> --}}
                            <th class="text-left">
                                @lang('crud.tickets.inputs.customer_id')
                            </th>
                            <th class="text-left">
                                Age
                            </th>
                            <th class="text-left">
                                @lang('crud.tickets.inputs.campuse_id')
                            </th>


                            <th class="text-left">
                                @lang('crud.tickets.inputs.organizational_unit_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.tickets.inputs.problem_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tickets as $ticket)
                            <tr>

                                {{-- <td>{{ $ticket->description ?? '-' }}</td> --}}
                                <td>
                                    {{ optional($ticket->customer)->full_name ?? '-' }}
                                </td>
                                <td>
                                    @php $age = Carbon\Carbon::parse($ticket->created_at)->diffForHumans();
                                    $duration = $duration = Carbon\Carbon::parse($ticket->created_at)->diffInHours();
                                    
                                    @endphp
                                    
                                 @if($duration<=24 )
                                    <span class="badge badge-success">{{  $age}} </span>
                                    @elseif($duration > 24 && $duration<= 48 )
                                    <span class="badge badge-warning">{{  $age}} </span>
                                    @else
                                    <span class="badge badge-danger">{{  $age}} </span>
                                  @endif 
                                  
                                </td>
                                <td>
                                    {{ optional($ticket->campuse)->name ?? '-' }}
                                </td>


                                <td>
                                    {{ optional($ticket->organizationalUnit)->name ?? '-' }}
                                </td>
                                <td>
                                    {{ optional($ticket->problem)->name ?? '-' }}
                                </td>
                                <td class="text-center" style="width: 134px;">
                                    <div role="group" aria-label="Row Actions" class="btn-group">
                                        @can('update', $ticket)
                                            <a href="{{ route('tickets.edit', $ticket) }}">
                                                <button type="button" class="btn btn-light">
                                                    <i class="fa-solid fa-pen-to-square fa-lg" style="color: #e3c116;"></i>
                                                </button>
                                            </a>
                                            @endcan @can('view', $ticket)
                                            <a href="{{ route('tickets.show', $ticket) }}">
                                                <button type="button" class="btn btn-red">
                                                    <i class=" fa-solid fa-eye fa-lg" style="color: #286ce2;"></i>
                                                </button>
                                            </a>
                                            @endcan @can('delete', $ticket)
                                            <form action="{{ route('tickets.destroy', $ticket) }}" method="POST"
                                                onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-light text-danger">
                                                    <i class="fa-solid fa-trash fa-lg" style="color: #f00f0f;"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9">
                                    @lang('crud.common.no_items_found')
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                   
                </table>
            </div>
           
        </div>
    </div>
    </div>
@endsection
