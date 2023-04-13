@php $editing = isset($organizationalUnit) @endphp

<div class="row">
    <x-inputs.group class="col-md-12">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $organizationalUnit->name : ''))"
            maxlength="255"
            placeholder="Name"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-md-12">
        <x-inputs.number
            name="offcie_no"
            label="Offcie No"
            :value="old('offcie_no', ($editing ? $organizationalUnit->offcie_no : ''))"
            max="255"
            placeholder="Offcie No"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-md-12">
        <x-inputs.select name="campuse_id" label="Campuse">
            @php $selected = old('campuse_id', ($editing ? $organizationalUnit->campuse_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Campus</option>
            @foreach($campuses as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-md-12">
        <x-inputs.select name="building_id" label="Building">
            @php $selected = old('building_id', ($editing ? $organizationalUnit->building_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Building</option>
            @foreach($buildings as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-md-12">
        <x-inputs.select name="prioritie_id" label="Prioritie">
            @php $selected = old('prioritie_id', ($editing ? $organizationalUnit->prioritie_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Prioritie</option>
            @foreach($priorities as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
