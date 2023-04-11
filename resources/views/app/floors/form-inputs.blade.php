@php $editing = isset($floor) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $floor->name : ''))"
            maxlength="255"
            placeholder="Name"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="description"
            label="Description"
            :value="old('description', ($editing ? $floor->description : ''))"
            maxlength="255"
            placeholder="Description"
        ></x-inputs.text>
    </x-inputs.group>
</div>
