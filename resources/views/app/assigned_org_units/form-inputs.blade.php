@php $editing = isset($assignedOrgUnit) @endphp

<div class="row">
    <x-inputs.group class="col-md-12">
        <x-inputs.select name="assigned_office_id" label="Assigned Office">
            @php $selected = old('assigned_office_id', ($editing ? $assignedOrgUnit->assigned_office_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Assigned Office</option>
            @foreach($assignedOffices as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-md-12">
        <x-inputs.select
            name="organizational_unit_id"
            label="Organizational Unit"
        >
            @php $selected = old('organizational_unit_id', ($editing ? $assignedOrgUnit->organizational_unit_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Organizational Unit</option>
            @foreach($organizationalUnits as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
