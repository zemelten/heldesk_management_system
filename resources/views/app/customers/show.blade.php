@extends('layouts.app')

@section('content')
<div class="">
    <div class="card collapsed-card">


        <div class="card-header">


            <h4 class="card-title">
                <a href="{{ route('customers.index') }}" class="mr-4"><i class="icon ion-md-arrow-back"></i></a>
                @lang('crud.customers.show_title')
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
                        <i class="fas fa-user"></i> @lang('crud.customers.inputs.full_name')
                        <span
                            class=" float-right"><span>{{ $customer->full_name ?? '-' }}</span></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-envelope"></i> @lang('crud.customers.inputs.email')
                        <span class=" float-right">{{ $customer->email ?? '-' }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-mobile"></i> @lang('crud.customers.inputs.phone_no')
                        <span class="float-right">{{ $customer->phone_no ?? '-' }}</span>

                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-building"></i> @lang('crud.customers.inputs.building_id')
                        <span
                            class=" float-right">{{ optional($customer->building)->name ?? '-' }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-uikit"></i> @lang('crud.customers.inputs.campus_id')
                        <span class=" float-right">{{ optional($customer->campus)->name ?? '-' }}</span>

                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-unit"></i> @lang('crud.customers.inputs.organizational_unit_id')
                        <span class=" float-right">{{ optional($customer->organizationalUnit)->name ?? '-'
                        }}</span>
                    </a>
                </li>



                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-unit"></i> @lang('crud.customers.inputs.floor_id')
                        <span class=" float-right">{{ optional($customer->floor)->name ?? '-' }}</span>
                    </a>
                </li>




                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-unit"></i> @lang('crud.customers.inputs.user_id')
                        <span class=" float-right"> {{ optional($customer->user)->full_name ?? '-' }}</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-chair-office"></i> @lang('crud.customers.inputs.office_num')
                        <span class=" float-right">{{ $customer->office_num ?? '-' }}</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-unit"></i>@lang('crud.customers.inputs.is_edited')
                        <span class=" float-right">{{ $customer->is_edited ?? '-' }}</span>
                    </a>
                </li>
                <div class="mt-4">
                    <a href="{{ route('customers.index') }}" class="btn btn-light">
                        <i class="icon ion-md-return-left"></i>
                        @lang('crud.common.back')
                    </a>
    
                    @can('create', App\Models\Customer::class)
                    <a href="{{ route('customers.create') }}" class="btn btn-light">
                        <i class="icon ion-md-add"></i> @lang('crud.common.create')
                    </a>
                    @endcan
                </div>

                
            </ul>


        </div>
        <!-- /.card-body -->







    </div>

    @can('view-any', App\Models\Ticket::class)
    <div class="card mt-4">
        <div class="card-body">
            <h4 class="card-title w-100 mb-2">Tickets</h4>

            <livewire:customer-tickets-detail :customer="$customer" />
        </div>
    </div>
    @endcan
</div>
@endsection
