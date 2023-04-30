@extends('layouts.app')

@section('content')
    <div class="">
        <div class="card card-danger">

            <div class="card-header">
                <h3 class="card-title">Please Update Your Information</h3>
            </div>
            <div class="card-body">
                <h4 class="card-title">
                    <a href="{{ route('tickets.index') }}" class="mr-4"><i class="icon ion-md-arrow-back"></i></a>
                    Update Your Details
                </h4>

                <x-form method="POST" action="{{ route('updateprofile.store') }}" class="mt-4">
                    @php $editing = isset($ticket) @endphp

                    <div class="row">

                      <x-inputs.group class="col-md-6">
                        <label>Phone number:</label>
      
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                          </div>
                          <x-inputs.text name="phone" id="phone"/>
                        </div>
                        <!-- /.input group -->
                      </x-inputs.group>
                        
                       
                      <x-inputs.group class="col-md-6">
                        <label>Email Address:</label>
      
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-clock "></i></span>
                          </div>
                          <x-inputs.text name="email" id="email"/>
                        </div>
                        <!-- /.input group -->
                      </x-inputs.group>
                        <x-inputs.group class="col-md-6">
                            <x-inputs.select name="campuse_id" label="Campus" id="campuse_id">
                                @php $selected = old('campuse_id', ($editing ? $ticket->campuse_id : '')) @endphp
                                <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Campus</option>
                                @foreach ($campuses as $value => $label)
                                    <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>
                                        {{ $label }}</option>
                                @endforeach
                            </x-inputs.select>
                        </x-inputs.group>
                      

                        <x-inputs.group class="col-md-6">
                            <x-inputs.select name="floor_id" label="Floor">
                                <option disabled {{ empty($selected) ? 'selected' : '' }}>Select Floor</option>
                                <option value="ground">Ground</option>
                                <option>1st Floor</option>
                                <option>2nd Floor</option>
                                <option>3rd Floor</option>
                                <option>4th Floor</option>
                            </x-inputs.select>
                        </x-inputs.group>
                        <x-inputs.group class="col-md-6">
                          <x-inputs.select name="building_id" label="Building" id="building_id">
                              <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select Building</option>
                              @foreach ($buildings as $value => $label)
                                  <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>
                                      {{ $label }}</option>
                              @endforeach
                          </x-inputs.select>
                      </x-inputs.group>


                        <x-inputs.group class="col-md-6">
                            <x-inputs.number name="office_id" label="Office No.">

                            </x-inputs.number>
                        </x-inputs.group>
                        
                        <x-inputs.group class="col-md-12">
                          <x-inputs.select name="organizational_unit_id" label="Organizational Unit"
                              id="organizational_unit_id">
                              @php $selected = old('organizational_unit_id', ($editing ? $ticket->organizational_unit_id : '')) @endphp
                              <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Organizational
                                  Unit</option>
                              @foreach ($organizationalUnits as $value => $label)
                                  <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>
                                      {{ $label }}</option>
                              @endforeach
                          </x-inputs.select>
                      </x-inputs.group>

                    </div>


                    <div class="mt-4">
                        <a href="{{ route('tickets.index') }}" class="btn btn-light">
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
                    $('#organizational_unit_id').html(
                    '<option value="">-- Select Org Unit --</option>');
                    $.each(res.orgs, function(key, value) {
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
                    $.each(res.blds, function(key, value) {
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
                    $.each(res.blds, function(key, value) {
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
