@php $editing = isset($ticket) @endphp

<div class="row">


    @if(Auth::user()->roles()->first()->name === "super-admin")

        <x-inputs.group class="col-md-6">
        <x-inputs.select name="customer_id" label="Customer" id="customer_id">
            @php $selected = old('customer_id', ($editing ? $ticket->customer_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Customers</option>
            @foreach($customers as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    @endif


    @if(Auth::user()->roles()->first()->name === "Customer")
    <x-inputs.group class="col-md-6">
        <x-inputs.select name="campuse_id" label="Campus" id="campuse_id">
            @php $selected = old('campuse_id', ($editing ? $ticket->campuse_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Campus</option>
            @foreach($campuses as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
    @endif

    <x-inputs.group class="col-md-6">
        <x-inputs.select name="problem_category_id" label="Problem Category">
            @php $selected = old('problem_category_id', ($editing ? $ticket->userSupport->problemCatagory: '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Problem  Category</option>
            @foreach($problemCategory as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    @if(Auth::user()->roles()->first()->name === "Customer")
    <x-inputs.group class="col-md-6">
        <x-inputs.select name="building_id" label="Building" id="building_id">
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select Building</option>
            @foreach($buildings as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
    @endif
    
    <x-inputs.group class="col-md-6">
        <x-inputs.select name="problem_id" label="Problem">
            @php $selected = old('problem_id', ($editing ? $ticket->problem_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Problem</option>
            @foreach($problems as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
    

    <x-inputs.group class="col-md-6">
        <x-inputs.select
            name="organizational_unit_id"
            label="Organizational Unit"
            id="organizational_unit_id"
        >
            @php $selected = old('organizational_unit_id', ($editing ? $ticket->organizational_unit_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Organizational Unit</option>
            @foreach($organizationalUnits as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
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

    <x-inputs.group class="col-md-12">
        <x-inputs.number name="office_id" label="Office No.">
           
        </x-inputs.number>
    </x-inputs.group>    
    <x-inputs.group class="col-md-12">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            >{{ old('description', ($editing ? $ticket->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

</div>
