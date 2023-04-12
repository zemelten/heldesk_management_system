@php $editing = isset($customer) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="full_name"
            label="Full Name"
            :value="old('full_name', ($editing ? $customer->full_name : ''))"
            maxlength="255"
            placeholder="Full Name"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.email
            name="email"
            label="Email"
            :value="old('email', ($editing ? $customer->email : ''))"
            maxlength="255"
            placeholder="Email"
        ></x-inputs.email>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="phone_no"
            label="Phone No"
            :value="old('phone_no', ($editing ? $customer->phone_no : ''))"
            maxlength="255"
            placeholder="Phone No"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="building_id" label="Building">
            @php $selected = old('building_id', ($editing ? $customer->building_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Building</option>
            @foreach($buildings as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="campus_id" label="Campus">
            @php $selected = old('campus_id', ($editing ? $customer->campus_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Campus</option>
            @foreach($campuses as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="organizational_unit_id"
            label="Organizational Unit"
        >
            @php $selected = old('organizational_unit_id', ($editing ? $customer->organizational_unit_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Organizational Unit</option>
            @foreach($organizationalUnits as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="floor_id" label="Floor">
            @php $selected = old('floor_id', ($editing ? $customer->floor_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Floor</option>
            @foreach($floors as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="user_id" label="User">
            @php $selected = old('user_id', ($editing ? $customer->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="office_num"
            label="Office Num"
            :value="old('office_num', ($editing ? $customer->office_num : ''))"
            maxlength="255"
            placeholder="Office Num"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.hidden
        name="is_edited"
        :value="old('is_edited', ($editing ? $customer->is_edited : '0'))"
    ></x-inputs.hidden>
</div>
