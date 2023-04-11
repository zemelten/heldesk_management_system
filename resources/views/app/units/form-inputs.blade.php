@php $editing = isset($unit) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="telephone"
            label="Telephone"
            :value="old('telephone', ($editing ? $unit->telephone : ''))"
            maxlength="255"
            placeholder="Telephone"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="fax"
            label="Fax"
            :value="old('fax', ($editing ? $unit->fax : ''))"
            maxlength="255"
            placeholder="Fax"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.email
            name="email"
            label="Email"
            :value="old('email', ($editing ? $unit->email : ''))"
            maxlength="255"
            placeholder="Email"
            required
        ></x-inputs.email>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="campuse_id" label="Campuse" required>
            @php $selected = old('campuse_id', ($editing ? $unit->campuse_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Campus</option>
            @foreach($campuses as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="director_id" label="Director" required>
            @php $selected = old('director_id', ($editing ? $unit->director_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Director</option>
            @foreach($directors as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="building_id" label="Building" required>
            @php $selected = old('building_id', ($editing ? $unit->building_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Building</option>
            @foreach($buildings as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="leader_id" label="Leader" required>
            @php $selected = old('leader_id', ($editing ? $unit->leader_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Leader</option>
            @foreach($leaders as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
