@php $editing = isset($userSupport) @endphp

<div class="row">
    <x-inputs.group class="col-md-12">
        <x-inputs.select name="user_id" label="User">
            @php $selected = old('user_id', ($editing ? $userSupport->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-md-12">
        <x-inputs.select name="leader_id" label="Leader">
            @php $selected = old('user_id', ($editing ? $userSupport->leader->id : ''))  @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Leader</option>
            @foreach ($leaders as $value => $label)
                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>{{ $label }}
                </option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-md-12">
        <x-inputs.text
            name="user_type"
            label="User Type"
            :value="old('user_type', ($editing ? $userSupport->user_type : ''))"
            maxlength="255"
            placeholder="User Type"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-md-12">
        <x-inputs.select name="problem_catagory_id" label="Problem Catagory">
            @php $selected = old('problem_catagory_id', ($editing ? $userSupport->problem_catagory_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Problem Catagory</option>
            @foreach($problemCatagories as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-md-12">
        <x-inputs.select name="building_id" label="Building">
            @php $selected = old('building_id', ($editing ? $userSupport->building_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Building</option>
            @foreach($buildings as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-md-12">
        <x-inputs.select name="service_unit_id" label="Service Unit" required>
            @php $selected = old('service_unit_id', ($editing ? $userSupport->service_unit_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Service Unit</option>
            @foreach($serviceUnits as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-md-12">
        <x-inputs.select name="unit_id" label="Unit" required>
            @php $selected = old('unit_id', ($editing ? $userSupport->unit_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Unit</option>
            @foreach($units as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
