<div>
    <div class="mb-4">
        @can('create', App\Models\Unit::class)
        <button class="btn btn-primary" wire:click="newUnit">
            <i class="icon ion-md-add"></i>
            @lang('crud.common.new')
        </button>
        @endcan @can('delete-any', App\Models\Unit::class)
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

    <x-modal id="director-units-modal" wire:model="showingModal">
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
                    <x-inputs.group class="col-md-12">
                        <x-inputs.text
                            name="unit.telephone"
                            label="Telephone"
                            wire:model="unit.telephone"
                            maxlength="255"
                            placeholder="Telephone"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-md-12">
                        <x-inputs.text
                            name="unit.fax"
                            label="Fax"
                            wire:model="unit.fax"
                            maxlength="255"
                            placeholder="Fax"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-md-12">
                        <x-inputs.email
                            name="unit.email"
                            label="Email"
                            wire:model="unit.email"
                            maxlength="255"
                            placeholder="Email"
                        ></x-inputs.email>
                    </x-inputs.group>

                    <x-inputs.group class="col-md-12">
                        <x-inputs.select
                            name="unit.campuse_id"
                            label="Campuse"
                            wire:model="unit.campuse_id"
                        >
                            <option value="null" disabled>Please select the Campus</option>
                            @foreach($campusesForSelect as $value => $label)
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
        <table class="table table-bordered table-hover">
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
                        @lang('crud.director_units.inputs.telephone')
                    </th>
                    <th class="text-left">
                        @lang('crud.director_units.inputs.fax')
                    </th>
                    <th class="text-left">
                        @lang('crud.director_units.inputs.email')
                    </th>
                    <th class="text-left">
                        @lang('crud.director_units.inputs.campuse_id')
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($units as $unit)
                <tr class="hover:bg-gray-100">
                    <td class="text-left">
                        <input
                            type="checkbox"
                            value="{{ $unit->id }}"
                            wire:model="selected"
                        />
                    </td>
                    <td class="text-left">{{ $unit->telephone ?? '-' }}</td>
                    <td class="text-left">{{ $unit->fax ?? '-' }}</td>
                    <td class="text-left">{{ $unit->email ?? '-' }}</td>
                    <td class="text-left">
                        {{ optional($unit->campuse)->name ?? '-' }}
                    </td>
                    <td class="text-right" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="relative inline-flex align-middle"
                        >
                            @can('update', $unit)
                            <button
                                type="button"
                                class="btn btn-light"
                                wire:click="editUnit({{ $unit->id }})"
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
                    <td colspan="5">{{ $units->render() }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
