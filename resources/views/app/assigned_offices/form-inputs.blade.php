@php $editing = isset($assignedOffice) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="office_number"
            label="Office Number"
            :value="old('office_number', ($editing ? $assignedOffice->office_number : ''))"
            maxlength="255"
            placeholder="Office Number"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="building_id" label="Building">
            @php $selected = old('building_id', ($editing ? $assignedOffice->building_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Building</option>
            @foreach($buildings as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
