@php $editing = isset($building) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $building->name : ''))"
            maxlength="255"
            placeholder="Name"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="campuse_id" label="Campuse">
            @php $selected = old('campuse_id', ($editing ? $building->campuse_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Campus</option>
            @foreach($campuses as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
