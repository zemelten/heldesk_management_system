@extends('layouts.app')

@section('content')
<div class="">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('tickets.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.tickets.edit_title')
            </h4>

            <x-form
            method="PUT"
            action="{{ route('time-settings.update', $timeSetting) }}"
            class="mt-4"
            >
            @include('app.time_settings.form-inputs')

                <div class="mt-4">
                    <a
                        href="{{ route('time-settings.index') }}"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-return-left text-primary"></i>
                        @lang('crud.common.back')
                    </a>

                    <a
                        href="{{ route('time-settings.create') }}"
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
</div>
@endsection

@push('scripts')
<script>
    function showDiv(selectId, divId) {
        const select = document.getElementById(selectId);
        const div = document.getElementById(divId);
        if (select.value == 2) {
            div.style.display = 'block';
           
        } else {
            
            div.style.display = 'none';
        }
    }
    </script>
@endpush