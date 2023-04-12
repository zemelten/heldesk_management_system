@php $editing = isset($problem) @endphp

<div class="row">
    <x-inputs.group class="col-md-12">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $problem->name : ''))"
            maxlength="255"
            placeholder="Name"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-md-12">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            >{{ old('description', ($editing ? $problem->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-md-12">
        <x-inputs.select name="problem_catagory_id" label="Problem Catagory">
            @php $selected = old('problem_catagory_id', ($editing ? $problem->problem_catagory_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Problem Catagory</option>
            @foreach($problemCatagories as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
