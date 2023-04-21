@extends('layouts.app')

@section('content')
<div class="">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('floors.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.floors.edit_title')
            </h4>

            <x-form
                method="PUT"
                action="{{ route('floors.update', $floor) }}"
                class="mt-4"
            >
                @include('app.floors.form-inputs')

                <div class="mt-4">
                    <a href="{{ route('floors.index') }}" class="btn btn-light">
                        <i class="icon ion-md-return-left text-primary"></i>
                        @lang('crud.common.back')
                    </a>

                    <a
                        href="{{ route('floors.create') }}"
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
