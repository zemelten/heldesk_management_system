@extends('layouts.app')

@section('content')
<div class="">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('tickets.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.tickets.create_title')
            </h4>

            <x-form
                method="POST"
                action="{{ route('tickets.store') }}"
                class="mt-4"
            >
                @include('app.tickets.form-inputs')

                <div class="mt-4">
                    <a
                        href="{{ route('tickets.index') }}"
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
    $('#building_id').on('change', function() {
    var idState = this.value;
    $("#organizational_unit_id").html('');
    $.ajax({
        url: "{{ url('/get-org-units') }}",
        type: "POST",
        data: {
            building_id: idState,
            _token: '{{ csrf_token() }}'
        },
        dataType: 'json',
        success: function(res) {
            $('#organizational_unit_id').html('<option value="">-- Select Org Unit --</option>');
            $.each(res.orgs  , function(key, value) {
                $("#organizational_unit_id").append('<option value="' + value
                    .id + '">' + value.name + '</option>');
            });
        }
    });
});

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
$('#problem_category_id').on('change', function() {
    var idState = this.value;
    $("#problem_id").html('');
    $.ajax({
        url: "{{ url('/get-problems') }}",
        type: "POST",
        data: {
            problem_category_id: idState,
            _token: '{{ csrf_token() }}'
        },
        dataType: 'json',
        success: function(res) {
            $('#problem_id').html('<option value="">-- Select Building --</option>');
            $.each(res.blds  , function(key, value) {
                $("#problem_id").append('<option value="' + value
                    .id + '">' + value.name + '</option>');
            });
        }
    });
});
</script>
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2({
            // dropdownAutoWidth: true
             theme: "bootstrap4",
            //  width:'resolve'

        })
    });
    

</script>


@endpush




