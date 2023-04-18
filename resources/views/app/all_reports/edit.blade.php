@extends('layouts.app')

@section('content')
<div class="">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('all-reports.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.all_reports.edit_title')
            </h4>

            <x-form
                method="PUT"
                action="{{ route('all-reports.update', $reports) }}"
                class="mt-4"
            >
                @include('app.all_reports.form-inputs')

                <div class="mt-4">
                    <a
                        href="{{ route('all-reports.index') }}"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-return-left text-primary"></i>
                        @lang('crud.common.back')
                    </a>

                    <a
                        href="{{ route('all-reports.create') }}"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-add text-primary"></i>
                        @lang('crud.common.create')
                    </a>

                    <button type="submit" class="btn btn-primary float-right">
                        <i class="icon ion-md-save"></i>
                        @lang('crud.common.update')
                    </button>
                </div>
            </x-form>
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
