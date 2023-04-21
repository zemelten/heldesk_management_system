@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($isEdited === 1)
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>150</h3>

                                        <p>New Orders</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        {{-- <div class="container-xxl flex-grow-1 container-p-y"> --}}
    </div>
    @php $editing = isset($ticket) @endphp
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title ">Update Your Information</h3>
                </div>
                <form action="">

                    <div class="card-body">
                        <!-- phone mask -->
                        <div class="form-group">
                            <label>Phone number:</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="tel" class="form-control" data-inputmask='"mask": "(999) 999-9999"'
                                    data-mask>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->

                        <!-- phone mask -->
                        <div class="form-group">
                            <label>Email(optional):</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" class="form-control"
                                    data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->

                        <!-- IP mask -->
                        <div class="form-group">
                            <label>Campus:</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-laptop"></i></span>
                                </div>
                                {{-- <input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask> --}}
                                <select name="campuse_id" class="select2" id="campuse_id">
                                    @php $selected = old('campuse_id', ($editing ? $ticket->campuse_id : '')) @endphp
                                    <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Campus
                                    </option>
                                    @foreach ($campus as $value)
                                        <option value="{{ $value->id }}" {{ $selected == $value ? 'selected' : '' }}>
                                            {{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                        <div class="form-group">
                            <label>Building:</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-laptop"></i></span>
                                </div>
                                {{-- <input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask> --}}
                                <select name="building_id" class="select2" id="building_id">
                                    <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select Building
                                    </option>
                                    @foreach ($buildings as $value)
                                        <option value="{{ $value->id }}" {{ $selected == $value ? 'selected' : '' }}>
                                            {{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                        <div class="form-group">
                            <label>Organizational Unit:</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-laptop"></i></span>
                                </div>
                                {{-- <input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask> --}}
                                <select name="campus" class="select2" id="organizational_unit_id">
                                    @php $selected = old('organizational_unit_id', ($editing ? $ticket->organizational_unit_id : '')) @endphp
                                    <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the
                                        Organizational Unit</option>
                                    @foreach ($organizationalUnits as $value)
                                        <option value="{{ $value->id }}" {{ $selected == $value ? 'selected' : '' }}>
                                            {{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </div>
                </form>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.card -->

        </div>
        <!-- /.col (left) -->
        <!-- /.col (right) -->
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
    </script>
@endpush
