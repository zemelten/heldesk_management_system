<div>
    <div class="mb-4">
        @can('create', App\Models\OrganizationalUnit::class)
        <button class="btn btn-primary" wire:click="newOrganizationalUnit">
            <i class="icon ion-md-add"></i>
            @lang('crud.common.new')
        </button>
        @endcan @can('delete-any', App\Models\OrganizationalUnit::class)
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

    <x-modal id="building-organizational-units-modal" wire:model="showingModal">
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
                            name="organizationalUnit.name"
                            label="Name"
                            wire:model="organizationalUnit.name"
                            maxlength="255"
                            placeholder="Name"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.number
                            name="organizationalUnit.offcie_no"
                            label="Offcie No"
                            wire:model="organizationalUnit.offcie_no"
                            max="255"
                            placeholder="Offcie No"
                        ></x-inputs.number>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.select
                            name="organizationalUnit.campuse_id"
                            label="Campuse"
                            wire:model="organizationalUnit.campuse_id"
                        >
                            <option value="null" disabled>Please select the Campus</option>
                            @foreach($campusesForSelect as $value => $label)
                            <option value="{{ $value }}"  >{{ $label }}</option>
                            @endforeach
                        </x-inputs.select>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.select
                            name="organizationalUnit.prioritie_id"
                            label="Prioritie"
                            wire:model="organizationalUnit.prioritie_id"
                        >
                            <option value="null" disabled>Please select the Prioritie</option>
                            @foreach($prioritiesForSelect as $value => $label)
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
                        @lang('crud.building_organizational_units.inputs.name')
                    </th>
                    <th class="text-right">
                        @lang('crud.building_organizational_units.inputs.offcie_no')
                    </th>
                    <th class="text-left">
                        @lang('crud.building_organizational_units.inputs.campuse_id')
                    </th>
                    <th class="text-left">
                        @lang('crud.building_organizational_units.inputs.prioritie_id')
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($organizationalUnits as $organizationalUnit)
                <tr class="hover:bg-gray-100">
                    <td class="text-left">
                        <input
                            type="checkbox"
                            value="{{ $organizationalUnit->id }}"
                            wire:model="selected"
                        />
                    </td>
                    <td class="text-left">
                        {{ $organizationalUnit->name ?? '-' }}
                    </td>
                    <td class="text-right">
                        {{ $organizationalUnit->offcie_no ?? '-' }}
                    </td>
                    <td class="text-left">
                        {{ optional($organizationalUnit->campuse)->name ?? '-'
                        }}
                    </td>
                    <td class="text-left">
                        {{ optional($organizationalUnit->prioritie)->name ?? '-'
                        }}
                    </td>
                    <td class="text-right" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="relative inline-flex align-middle"
                        >
                            @can('update', $organizationalUnit)
                            <button
                                type="button"
                                class="btn btn-light"
                                wire:click="editOrganizationalUnit({{ $organizationalUnit->id }})"
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
                    <td colspan="5">{{ $organizationalUnits->render() }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
