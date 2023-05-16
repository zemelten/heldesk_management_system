@extends('layouts.app')

@section('content')
<div class="">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('directors.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.directors.edit_title')
            </h4>

            <x-form
                method="PUT"
                action="{{ route('directors.update', $director) }}"
                class="mt-4"
            >
                @include('app.directors.form-inputs')

                <div class="mt-4">
                    <a
                        href="{{ route('directors.index') }}"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-return-left text-primary"></i>
                        @lang('crud.common.back')
                    </a>

                    <a
                        href="{{ route('directors.create') }}"
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

    @can('view-any', App\Models\Unit::class)
    <div class="card mt-4">
        <div class="card-body">
            <h4 class="card-title w-100 mb-2">Units</h4>

            <livewire:director-units-detail :director="$director" />
        </div>
    </div>
    @endcan
</div>
@endsection
