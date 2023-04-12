<div class="w-100 p-0">
    <x-inputs.group class="col-md-12">
        <x-inputs.select name="id" label="Id" wire:model="selectedId">
            <option selected>Please select the id</option>
            @foreach($allIds as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
    @if(!empty($selectedId))
    <x-inputs.group class="col-md-12">
        <x-inputs.select name="name" label="Name" wire:model="selectedName">
            <option selected>Please select the name</option>
            @foreach($allNames as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </x-inputs.select> </x-inputs.group
    >@endif
</div>
