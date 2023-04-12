<div>
    <div class="mb-4">
        @can('create', App\Models\ServiceUnit::class)
        <button class="btn btn-primary" wire:click="newServiceUnit">
            <i class="icon ion-md-add"></i>
            @lang('crud.common.new')
        </button>
        @endcan @can('delete-any', App\Models\ServiceUnit::class)
        <button
            class="btn btn-danger"
             {{ empty($selected) ? 'disabled' : '' }} 
            onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
            wire:click="destroySelected"
        >
            <i class="icon ion-md-trash"></i>
            @lang('crud.common.delete_selected')
        </button>
        @endcan
    </div>

    <x-modal id="unit-service-units-modal" wire:model="showingModal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $modalTitle }}</h5>
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div>
                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="serviceUnit.name"
                            label="Name"
                            wire:model="serviceUnit.name"
                            maxlength="255"
                            placeholder="Name"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="serviceUnit.telephone"
                            label="Telephone"
                            wire:model="serviceUnit.telephone"
                            maxlength="255"
                            placeholder="Telephone"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="serviceUnit.fax"
                            label="Fax"
                            wire:model="serviceUnit.fax"
                            maxlength="255"
                            placeholder="Fax"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.email
                            name="serviceUnit.email"
                            label="Email"
                            wire:model="serviceUnit.email"
                            maxlength="255"
                            placeholder="Email"
                        ></x-inputs.email>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.textarea
                            name="serviceUnit.discription"
                            label="Discription"
                            wire:model="serviceUnit.discription"
                            maxlength="255"
                        ></x-inputs.textarea>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.select
                            name="serviceUnit.leader_id"
                            label="Leader"
                            wire:model="serviceUnit.leader_id"
                        >
                            <option value="null" disabled>Please select the Leader</option>
                            @foreach($leadersForSelect as $value => $label)
                            <option value="{{ $value }}"  >{{ $label }}</option>
                            @endforeach
                        </x-inputs.select>
                    </x-inputs.group>
                </div>
            </div>

            @if($editing) @endif

            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-light float-left"
                    wire:click="$toggle('showingModal')"
                >
                    <i class="icon ion-md-close"></i>
                    @lang('crud.common.cancel')
                </button>

                <button type="button" class="btn btn-primary" wire:click="save">
                    <i class="icon ion-md-save"></i>
                    @lang('crud.common.save')
                </button>
            </div>
        </div>
    </x-modal>

    <div class="table-responsive">
        <table class="table table-borderless table-hover">
            <thead>
                <tr>
                    <th>
                        <input
                            type="checkbox"
                            wire:model="allSelected"
                            wire:click="toggleFullSelection"
                            title="{{ trans('crud.common.select_all') }}"
                        />
                    </th>
                    <th class="text-left">
                        @lang('crud.unit_service_units.inputs.name')
                    </th>
                    <th class="text-left">
                        @lang('crud.unit_service_units.inputs.telephone')
                    </th>
                    <th class="text-left">
                        @lang('crud.unit_service_units.inputs.fax')
                    </th>
                    <th class="text-left">
                        @lang('crud.unit_service_units.inputs.email')
                    </th>
                    <th class="text-left">
                        @lang('crud.unit_service_units.inputs.discription')
                    </th>
                    <th class="text-left">
                        @lang('crud.unit_service_units.inputs.leader_id')
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($serviceUnits as $serviceUnit)
                <tr class="hover:bg-gray-100">
                    <td class="text-left">
                        <input
                            type="checkbox"
                            value="{{ $serviceUnit->id }}"
                            wire:model="selected"
                        />
                    </td>
                    <td class="text-left">{{ $serviceUnit->name ?? '-' }}</td>
                    <td class="text-left">
                        {{ $serviceUnit->telephone ?? '-' }}
                    </td>
                    <td class="text-left">{{ $serviceUnit->fax ?? '-' }}</td>
                    <td class="text-left">{{ $serviceUnit->email ?? '-' }}</td>
                    <td class="text-left">
                        {{ $serviceUnit->discription ?? '-' }}
                    </td>
                    <td class="text-left">
                        {{ optional($serviceUnit->leader)->full_name ?? '-' }}
                    </td>
                    <td class="text-right" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="relative inline-flex align-middle"
                        >
                            @can('update', $serviceUnit)
                            <button
                                type="button"
                                class="btn btn-light"
                                wire:click="editServiceUnit({{ $serviceUnit->id }})"
                            >
                                <i class="icon ion-md-create"></i>
                            </button>
                            @endcan
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7">{{ $serviceUnits->render() }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
