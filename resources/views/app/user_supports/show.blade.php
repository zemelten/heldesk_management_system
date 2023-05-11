@extends('layouts.app')

@section('content')
    <div class="">


        
        <div class="card collapsed-card">
            <div class="card-header">


                <h4 class="card-title">
                    <a href="{{ route('user-supports.index') }}" class="mr-4"><i class="icon ion-md-arrow-back"></i></a>
                    @lang('crud.user_supports.show_title')
                </h4>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0" style="display: none;">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item active">
                        <a href="#" class="nav-link">
                            <i class="fas fa-user"></i> @lang('crud.user_supports.inputs.user_id')
                            <span
                                class=" float-right">{{ optional($userSupport->user)->full_name ?? '-' }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-user"></i> @lang('crud.user_supports.inputs.user_type')
                            <span class=" float-right">{{ $userSupport->user_type ?? '-' }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-building"></i> @lang('crud.user_supports.inputs.building_id')
                            <span class="float-right">{{ optional($userSupport->building)->name ?? '-' }}</span>

                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-filter"></i> @lang('crud.user_supports.inputs.problem_catagory_id')
                            <span
                                class=" float-right">{{ optional($userSupport->problemCatagory)->name ?? '-' }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-unit"></i> @lang('crud.user_supports.inputs.service_unit_id')
                            <span class=" float-right">{{ optional($userSupport->serviceUnit)->name ?? '-' }}</span>

                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-unit"></i> @lang('crud.user_supports.inputs.unit_id')
                            <span class=" float-right">{{ optional($userSupport->unit)->telephone ?? '-' }}</span>

                        </a>
                    </li>
                </ul>
            </div>
            <!-- /.card-body -->
        </div>




        @can('view-any', App\Models\Ticket::class)
            <div class="card mt-4">
                <div class="card-body">
                    <h4 class="card-title w-100 mb-2">Tickets</h4>

                    <livewire:user-support-tickets-detail :userSupport="$userSupport" />
                </div>
            </div>
            {{-- @endcan @can('view-any', App\Models\EscalatedTicket::class)
            <div class="card mt-4">
                <div class="card-body">
                    <h4 class="card-title w-100 mb-2">Escalated Tickets</h4>

                    <livewire:user-support-escalated-tickets-detail :userSupport="$userSupport" />
                </div>
            </div>
        @endcan --}}
    </div>
@endsection
