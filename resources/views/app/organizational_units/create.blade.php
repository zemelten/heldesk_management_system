@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('organizational-units.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.organizational_units.create_title')
            </h4>

            <x-form
                method="POST"
                action="{{ route('organizational-units.store') }}"
                class="mt-4"
            >
                @include('app.organizational_units.form-inputs')

                <div class="mt-4">
                    <a
                        href="{{ route('organizational-units.index') }}"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-return-left text-primary"></i>
                        @lang('crud.common.back')
                    </a>

                    <button type="submit" class="btn btn-primary float-right">
                        <i class="icon ion-md-save"></i>
                        @lang('crud.common.create')
                    </button>
                </div>
            </x-form>
        </div>
    </div>
</div>
@endsection
@push('scripts')

<script>
    $('#campuse_id').on('change', function() {
    var idState = this.value;
    $("#building_id").html('');
    $.ajax({
        url: "{{ url('/get-buildings') }}",
        type: "POST",
        data: {
            campuse_id: idState,
            _token: '{{ csrf_token() }}'
        },
        dataType: 'json',
        success: function(res) {
            $('#building_id').html('<option value="">-- Select Building --</option>');
            $.each(res.blds  , function(key, value) {
                $("#building_id").append('<option value="' + value
                    .id + '">' + value.name + '</option>');
            });
        }
    });
});
</script>
@endpush
