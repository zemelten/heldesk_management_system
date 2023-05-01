@php $editing = isset($timeSetting) @endphp

<div class="col">
    <x-inputs.group class="col-md-6">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $timeSetting->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-md-6">
        <x-inputs.number
            name="time"
            label="Days"
            :value="old('time', ($editing ? $timeSetting->time : ''))"
            maxlength="255"
            placeholder="Days"
            required
        ></x-inputs.number>
    </x-inputs.group>
</div>
