@php $editing = isset($prioritie) @endphp

<div class="row">
    <x-inputs.group class="col-md-12">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $prioritie->name : ''))"
            maxlength="255"
            placeholder="Name"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-md-12">
        <x-inputs.text
            name="response"
            label="Response"
            :value="old('response', ($editing ? $prioritie->response : ''))"
            maxlength="255"
            placeholder="Response"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-md-12">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            >{{ old('description', ($editing ? $prioritie->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
