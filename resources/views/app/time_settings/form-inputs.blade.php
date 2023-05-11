@php $editing = isset($timeSetting) @endphp

<div class="col">
    <x-inputs.group class="col-md-6">
<<<<<<< HEAD
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
        <x-inputs.text
            name="time"
            label="Days"
            :value="old('time', ($editing ? $timeSetting->time : ''))"
            maxlength="255"
            placeholder="Days"
            required
        ></x-inputs.text>
    </x-inputs.group>
=======
        <x-inputs.text name="name" label="Name" :value="old('name', $editing ? $timeSetting->name : '')" maxlength="255" placeholder="Name" required>
        </x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-md-6">
        <x-inputs.number name="time" label="Duration" :value="old('time', $editing ? $timeSetting->time : '')" maxlength="255"
            placeholder="Enter in days or in minutes" required></x-inputs.number>

        <input type="radio" id="day" name="type" value="0" required>
        <label for="day">In days</label><br>
        <input type="radio" id="day" name="type" value="1" required>
        <label for="day">In Hour</label><br>
        <input type="radio" id="minute" name="type" value="2" required>
        <label for="minute">In minute</label><br>
    </x-inputs.group>

>>>>>>> ed1045e654c2741bceb7317ca5650a2bfa8a0242
</div>
