@php $editing = isset($director) @endphp

<div class="row">
    <x-inputs.group class="col-md-12">
        <x-inputs.text
            name="full_name"
            label="Full Name"
            :value="old('full_name', ($editing ? $director->full_name : ''))"
            maxlength="255"
            placeholder="Full Name"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-md-12">
        <x-inputs.select name="sex" label="Sex">
            @php $selected = old('sex', ($editing ? $director->sex : '')) @endphp
            <option value="male" {{ $selected == 'male' ? 'selected' : '' }} >Male</option>
            <option value="female" {{ $selected == 'female' ? 'selected' : '' }} >Female</option>
            <option value="other" {{ $selected == 'other' ? 'selected' : '' }} >Other</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-md-12">
        <x-inputs.email
            name="email"
            label="Email"
            :value="old('email', ($editing ? $director->email : ''))"
            maxlength="255"
            placeholder="Email"
        ></x-inputs.email>
    </x-inputs.group>

    <x-inputs.group class="col-md-12">
        <x-inputs.text
            name="phone"
            label="Phone"
            :value="old('phone', ($editing ? $director->phone : ''))"
            maxlength="255"
            placeholder="Phone"
        ></x-inputs.text>
    </x-inputs.group>
</div>
